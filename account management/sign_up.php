<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign UP</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Fname" id="name" placeholder="First name" required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Lname" id="name" placeholder="Last name" required/>
                            </div>
                            <div class="form-group">
                                <label for="user_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="user name"required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="address" id="address" placeholder="address" required/>
                            </div> 
                            <div >
                                <h2>gender</h2>
                                <select name="gender" id="gender" style="padding: 8px 24px; border-radius: 8px;">
                                <option value="male" style="">male</option>
                                <option value="female" style="">female</option>
                                </select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/car.jpg" alt="sing up image" style="border-radius: 14px;"></figure>
                        <a href="sign_in.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        include "../phpSqlConnect.php";
                        if(isset($_POST['signup'])&& !empty($_POST['signup']))
                        {
                            $user_name=$_POST['user_name'];
                            $User_Password=$_POST['password'];
                            $User_Email=$_POST['email'];
                            $user_gender=$_POST['gender'];
                            $user_phone=$_POST['phone'];
                            $User_Fname=$_POST['Fname'];
                            $User_Lname=$_POST['Lname'];
                            $user_addressr=$_POST['address'];
                            $result="SELECT User_Email FROM user ";
                            $res = $connection->query($result);
                            $test="";
                            while ($row = $res->fetch_assoc()) {
                                if($row['User_Email']==$User_Email)
                                    {
                                        $test=1;
                                        break;
                                    }
                                }
                                    if($test==1)
                                    {
                                        echo  '<p style="color: red; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width: 900px;position: relative;bottom: 100px;left:50%;transform: translateX(-50%);border-radius: 16px;">Error :Email already used</p>';
                                    }
                                    else
                                    {
                                        $sql="INSERT INTO user (User_UserName, User_Password, User_Email, User_gender, User_phone, User_Fname, User_Lname, User_address) VALUES ( '$user_name', '$User_Password', '$User_Email', '$user_gender', '$user_phone', '$User_Fname', '$User_Lname', '$user_addressr')";
                                        if($connection->query($sql)===TRUE)
                                            {
                                            // True
                                                echo '<p style="color: green; background-color: rgba(172, 255, 47, 0.267);padding: 14px;text-align: center;margin-top:-80px;display:inline-block;left: 50%;width: 900px;position: relative;bottom: 100px;left:50%;transform: translateX(-50%);border-radius: 16px;">data inserted successfully!!</p>';
                                               echo' <a href="../main.php">go to main page</a>';
                                            }
                                            else{
                                            // False
                                                echo  '<p style="color: red; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width: 900px;position: relative;bottom: 100px;left:50%;transform: translateX(-50%);border-radius: 16px;">Error while inserting data</p>';
                                            }
                                    }
                            }
                        ?>
</body>
</html>