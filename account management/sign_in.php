<?php
include'var.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign IN</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/car2.jpg" alt="sing up image"style="border-radius: 14px;height: 300px; "></figure>
                        <a href="sign_up.php" class="signup-image-link" style="text-align: center;">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_Email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="your_email" id="your_name" required placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" required placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php

        include '../phpSqlConnect.php';
        if(isset($_POST['signin'])&&!empty($_POST['signin']))
        {
           $email= $_POST['your_email'];
           $pass= $_POST['your_pass'];
           $result="SELECT * FROM user ";
                            $res = $connection->query($result);
                            $test=0;
                            while ($row = $res->fetch_assoc()) {
                                if($row['User_Email']==$email)
                                    {
                                        if($row['User_Password']==$pass)
                                            {

                                                session_start();
                                                $_SESSION["user_id"] = $row['User_id'];
                                                $ok=true;
                                                
                                                echo  $_SESSION["user_id"];
                                                $ok=true;
                                                header('Location:../main.php');
                                                $ok=true;
                                                $test=1;
                                                break;
                                            }
                                    }
                                }
                                if($test==0)
                                {
                                    echo  '<p style="color: red; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width: 900px;position: relative;bottom: 100px;left:50%;transform: translateX(-50%);border-radius: 16px;">Error while inserting data</p>';
                                } 

        }
        ?> 
    </div>
    <!-- <p style="color: green; background-color: rgba(172, 255, 47, 0.267);padding: 8px;text-align: center;display: inline-block;margin-left: 160px;width: 900px;position: relative;bottom: 100px;left:37%;transform: translateX(-50%);border-radius: 16px;">Error while inserting data</p> -->
</body>
</html>