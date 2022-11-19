<?php
include'account management\var.php';

?>

<?php 
$ok=true;

    session_start();
include 'phpSqlConnect.php';
    if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']))
    {
    $ok=true;
        $userid=$_SESSION['user_id'];
        $sqll="SELECT * FROM user WHERE User_id=$userid";
    }
    else
    {
         header('Location:account management\sign_in.php');
    }
    $res = $connection->query($sqll);
    $user_info = $res->fetch_assoc();
    $temppassword="";
    for ($x = 0; $x <strlen($user_info['User_Password']); $x+=1) {
        $temppassword=$temppassword."*";
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
            box-sizing: content-box;
            margin: 0px;
        }
        /* Add a black background color to the top navigation */
        body{
            overflow-x:hidden;
        }

/* Add a color to the active/current link */
aside {
    width: 15%;
    padding-left: 15px;
    float: left;
    font-style: italic;
    height:100%;
    margin-right:40px;
    margin-top:40px;
    
}

.bdy{
    display:flex;
    height: fit-content;
}
.navbar
{
    display: flex;
    align-items: center;
    padding: 20px;
    margin-bottom: 70px;
    background:radial-gradient(#fff,#2a9ae6) ;
    padding-bottom:60px
}
nav{
    flex: 1;
    text-align: right;

}
nav ul{
    display: inline-block;
    list-style-type: none;
    margin-top:20px;
    
    
}
nav ul li{
    display: inline-block;
    margin-right: 20px;
    
}
/* nav ul li:last-child{
    margin-right: 20px;
} */
a{
    text-decoration: none;
    color: #555;
}
    </style>
    <title>Document</title>
</head>
<style>
</style>
<body>
    <div class="navbar" >
                <nav >
                    <img src="images/logo3.png" width="100px" style="float: left;position: absolute;top: 0%;left: 40px;">
                    <ul style="width:100%" style="position:relative;display: flex;align-content: flex-end;">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="sellcar.php">Sell your car</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <?php 
                    session_start();
                    if(isset($_SESSION["user_id"])&& !empty($_SESSION["user_id"]))
                    {
                        $account_link="profile.php";
                        $visiple="";
                    }
                    else
                    {
                        $account_link="account_management/sign_in.php";
                        $visiple="hidden";
                    }
                    ?>

                    <?php
            if($ok==true)
                    {?>
                        
                        <li  ><form action="" method="post"><button style="background-color: transparent;border: none;cursor:pointer;" name="log_out" value="log out"<?php $visiple ?>> <i class="fa fa-sign-out" aria-hidden="true"></i></button></form></li>
                    <?php
                    if(isset($_POST['log_out']) && !empty($_POST['log_out']))
                    {
                        session_destroy();
                        header('location:account management\sign_in.php');
                    }
                    ?>
                        
                        
                        
                        <?php

                    }
                    
           ?>
                    
                </ul>
            </nav>
    </div>
    <div class="bdy">
        <aside>
        </aside>
        <div style="width: 600px;">
            <h1 style="font-weight: lighter;" >Accout details</h1>
            <hr style="margin-bottom: 60px;margin-top:20px">
            <form action="" method="post" style="padding: 5px 20px 5px;margin-bottom: 60px;border-radius: 18px;position: relative;">
                <h2 style="font-size: 24px;font-weight: 600;word-spacing: 1px;letter-spacing: 1px;margin-bottom: 20px; ">sign in details</h2>
                <br>
                <label for="email" style="font-size: 20px;">Email  :</label>
                <input type="email"name="email" id="email" value="<?php echo $user_info['User_Email']; ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300; position: absolute;left: 25%;padding: 0px 8px 8px 8px;">
                <br><br>
                <label for="password" style="font-size: 20px;">password  :</label>
                <input type="password" name="password" id="password" value="<?php echo $temppassword; ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <input type="button" value="edit" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 8px;position: absolute;top: 40px;right: 40px;cursor:pointer" onclick="edit_sign_in_details()">
                <input type="submit" name="save"id="save" value="save" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 18px;position: absolute;bottom:10px;right: 40px;cursor:pointer;visibility: hidden;" >
                <?php 
                if(isset($_POST['save']) && !empty($_POST['save']))
                {
                    $updte="";
                    if(isset($_POST['password']) && !empty($_POST['password'])&& isset($_POST['email']) && !empty($_POST['email']))
                    {
                        $password=$_POST['password'];
                        $email=$_POST['email'];
                        $updte=$updte. "UPDATE user SET User_Password = '$password',User_Email= '$email' WHERE user.User_id =$userid ";
                        header('Location:profile.php');
                    } 
                    if($connection->query($updte)===TRUE)
                    {
                echo '<p style="color: green; background-color: rgba(172, 255, 47, 0.267);padding: 14px;text-align: center;margin-top:-80px;display:inline-block;left: 50%;width: 100%;margin-top:10px;border-radius: 16px;">data inserted successfully!!</p>';
            }
                    else{
                echo  '<p style="color: red;margin-top:10px; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width:100%;border-radius: 16px;">Error while inserting data</p>';                    }
                }
                ?>
            </form>
            <hr style="margin-bottom: 60px;margin-top:20px">
            
            <form action="" method="post" style="padding: 5px 20px 5px;margin-bottom: 60px;border-radius: 18px;position: relative;">
                <h2 style="font-size: 24px;font-weight: 600;word-spacing: 1px;letter-spacing: 1px;margin-bottom: 20px; ">Personal details</h2>
                <br>
                <label for="username" style="font-size: 20px;">Username  :</label>
                <input type="text"name="username" id="username" value="<?php echo $user_info['User_UserName']; ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300; position: absolute;left: 25%;padding: 0px 8px 8px 8px;">
                <br><br>
                <label for="Phone" style="font-size: 20px;">Phone  :</label>
                <input type="text" name="Phone" id="Phone" value="<?php echo $user_info['User_phone'] ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="fname" style="font-size: 20px;">First Name  :</label>
                <input type="text" name="fname" id="fname" value="<?php echo $user_info['User_Fname'] ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="lname" style="font-size: 20px;">Last Name  :</label>
                <input type="text" name="lname" id="lname" value="<?php echo $user_info['User_Lname'] ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="address" style="font-size: 20px;">Address  :</label>
                <input type="text" name="address" id="address" value="<?php echo $user_info['User_address'] ?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <input type="button" value="edit" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 8px;position: absolute;top: 40px;right: 40px;cursor:pointer" onclick="edit_personal_details()">
                <input type="submit" name="save2"id="save2" value="save" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 18px;position: absolute;bottom:10px;right: 40px;cursor:pointer;visibility: hidden;" >
            </form>
            <hr style="margin-bottom: 60px;margin-top:20px">
            <?php
            if(isset($_POST['save2']) && !empty($_POST['save2']))
                {
                    
                        $username=$_POST['username'];
                        $Phone=$_POST['Phone'];
                        $fname=$_POST['fname'];
                        $lname=$_POST['lname'];
                        $address=$_POST['address'];
                        $updte2= "UPDATE `user` SET `User_UserName` = '$username', `User_phone` = '$Phone', `User_Fname` = '$fname', `User_Lname` = '$lname', `User_address` = '$address' WHERE `user`.`User_id` = $userid; ";
                        header('Location:profile.php');
                    if($connection->query($updte2)===TRUE)
                    {
                echo '<p style="color: green; background-color: rgba(172, 255, 47, 0.267);padding: 14px;text-align: center;margin-top:-80px;display:inline-block;left: 50%;width: 100%;margin-top:10px;border-radius: 16px;">data inserted successfully!!</p>';
            }
                    else{
                echo  '<p style="color: red;margin-top:10px; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width:100%;border-radius: 16px;">Error while inserting data</p>';                    }
                }
                ?>
        </div>
        
    </div>
    <?php 
        $sql3="SELECT * FROM `user_fav` WHERE User_Id=$userid";
        $res3 = $connection->query($sql3);
        
        while ($row3 = $res3->fetch_assoc() ) {
            $Car_Name=$row3['Car_Name'];
            $Model=$row3['Model'];
            $Year=$row3['Year'];
            $Color=$row3['Color'];
            $Fuel_Type=$row3['Fuel_Type'];
            $Price=$row3['Price'];
            $Engine_Size=$row3['Engine_Size'];
            $Transmission_Type=$row3['Transmission_Type'];
            $City=$row3['City'];
            $User_Fav_Id=$row3['User_Fav_Id'];
       
   
     } ?>
    <form  method="post" style="padding: 5px 20px 5px;margin-bottom: 60px;border-radius: 18px;position: relative;width: 600px;margin-left:240px">
                <h2 style="font-size: 24px;font-weight: 600;word-spacing: 1px;letter-spacing: 1px;margin-bottom: 20px; ">user preferences</h2>
                <br>
                <label for="Company" style="font-size: 20px;">Company :</label>
                <input type="text"name="Car_Name" id="Company" value="<?php echo $Car_Name?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300; position: absolute;left: 25%;padding: 0px 8px 8px 8px;">
                <br><br>
                <label for="Model" style="font-size: 20px;">Model  :</label>
                <input type="text" name="Model" id="Model" value="<?php echo $Model?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="Year" style="font-size: 20px;">Year  :</label>
                <input type="text" name="Year" id="Year" value="<?php echo $Year?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="Color" style="font-size: 20px;">Color  :</label>
                <input type="text" name="Color" id="Color" value="<?php echo $Color?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="Fuel_Type" style="font-size: 20px;">Fuel Type  :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="Fuel_Type" id="Fuel_Type" style="padding:0;width:220px;text-align:center" disabled>
                        <option value="gasoline" <?php if($Fuel_Type=="gasoline")
                        echo "selected";
                        ?>>gasoline</option>
                        <option value="diesel" <?php if($Fuel_Type=="diesel")
                        echo "selected";
                        ?>>diesel</option>
                        <option value="electric"<?php if($Fuel_Type=="electric")
                        echo "selected";
                        ?>>electric</option>
                </select> 
                <br><br>
                <label for="Price" style="font-size: 20px;">Price range :</label>
                <input type="range" name="Price" id="Price" value="<?php echo $Price?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;"min="0" max="1000000" onchange="updateTextInput(this.value);">
                <br>
                <input type="text" id="textInput" value="" disabled style="margin-left:140px;background-color:transparent ;border:none">
                <br><br>
                <label for="Engine_Size" style="font-size: 20px;">Engine Size  :</label>
                <input type="text" name="Engine_Size" id="Engine_Size" value="<?php echo $Engine_Size?>" disabled style="background-color: transparent;border-color: transparent;font-size: 20px;color: black;font-weight: 300;position: absolute;left: 25%;">
                <br><br>
                <label for="Transmission_Type">Transmission Type:</label>
                <select disabled name="Transmission_Type" id="Transmission_Type" style="padding:0;width:220px;text-align:center">
                        <option value="gear"<?php if($Transmission_Type=="gear")
                        echo "selected";
                        ?>>gear</option>
                        <option value="automatic"<?php if($Transmission_Type=="automatic")
                        echo "selected";
                        ?>>automatic</option>
                </select>  
                
                <br><br>
                <label for="City" >car City</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select disabled name="City" id="City" class="form-control validate"style="padding:0;width:220px;text-align:center">
                          <option value="Jerusalem"<?php if($City=="Jerusalem")
                        echo "selected";
                        ?>>Jerusalem</option>
                          <option value="Gaza"<?php if($City=="Gaza")
                        echo "selected";
                        ?>>Gaza</option>
                          <option value="Khan_Yunis"<?php if($City=="Khan_Yunis")
                        echo "selected";
                        ?>>Khan Yunis</option>
                          <option value="Jabalya"<?php if($City=="Jabalya")
                        echo "selected";
                        ?>>Jabalya</option>
                          <option value="Nablus"<?php if($City=="Nablus")
                        echo "selected";
                        ?>>Hebron</option>
                          <option value="Nablus"<?php if($City=="Nablus")
                        echo "selected";
                        ?>>Nablus</option>
                          <option value="Rafah"<?php if($City=="Rafah")
                        echo "selected";
                        ?>>Rafah</option>
                          <option value="Tulkarm"<?php if($City=="Tulkarm")
                        echo "selected";
                        ?>>Tulkarm</option>
                          <option value="Qalqilyah"<?php if($City=="Qalqilyah")
                        echo "selected";
                        ?>>Qalqilyah</option>
                          <option value="Yuta"<?php if($City=="Yuta")
                        echo "selected";
                        ?>>Yuta</option>
                          <option value="Bayt_Hanun"<?php if($City=="Bayt_Hanun")
                        echo "selected";
                        ?>>Bayt Hanun</option>
                          <option value="An_Nusayrat"<?php if($City=="An_Nusayrat")
                        echo "selected";
                        ?>>An Nusayrat</option>
                          <option value="Janin"<?php if($City=="Janin")
                        echo "selected";
                        ?>>Janin</option>
                          <option value="Bethlehem"<?php if($City=="Bethlehem")
                        echo "selected";
                        ?>>Bethlehem</option>
                          <option value="Ramallah"<?php if($City=="Ramallah")
                        echo "selected";
                        ?>>Ramallah</option>
                          <option value="hara_altahta"<?php if($City=="hara_altahta")
                        echo "selected";
                        ?>>hara altahta</option>
                        </select>
                <input type="button" value="edit" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 8px;position: absolute;top: 40px;right: 40px;cursor:pointer" onclick="car_details()">
                <input type="submit" name="save3"id="save3" value="save" style="background-color: transparent;color: blue;border-color: blue;border-radius: 6px;padding: 4px 18px;position: absolute;bottom:10px;right: 40px;cursor:pointer;visibility: hidden;" >
                </form>
                
                <?php
                
            if(isset($_POST['save3']) && !empty($_POST['save3']))
                {
                    
                        $Car_Name=$_POST['Car_Name'];
                        $Model=$_POST['Model'];
                        $Year=$_POST['Year'];
                        $Color=$_POST['Color'];
                        $Fuel_Type=$_POST['Fuel_Type'];
                        $Price=$_POST['Price'];
                        $Engine_Size=$_POST['Engine_Size'];
                        $Transmission_Type=$_POST['Transmission_Type'];
                        $City=$_POST['City'];
                        echo $_POST['User_Id'];
                        if(isset($User_Fav_Id) && !empty($User_Fav_Id))
                        $updte3= "UPDATE user_fav SET Car_Name='$Car_Name',Model='$Model',Year='$Year',Color='$Color',Fuel_Type='$Fuel_Type',Range_Price='$Range_Price',Engine_Size='$Engine_Size',Transmission_Type='$Transmission_Type',City='$City' WHERE User_Id='$userid' ";
                        else 
                        $updte3= "INSERT INTO user_fav(Car_Name, Model,Year, Color, Fuel_Type, Range_Price, Engine_Size, Transmission_Type, City,User_Id) VALUES ('$Car_Name', '$Model','$Year', '$Color', '$Fuel_Type', '$Range_Price', '$Engine_Size', '$Transmission_Type', '$City', '$userid') ";
                        
                    if($connection->query($updte3)===TRUE)
                    {
                echo '<p style="color: green; background-color: rgba(172, 255, 47, 0.267);padding: 14px;text-align: center;margin-top:-80px;display:inline-block;left: 50%;width: 100%;margin-top:10px;border-radius: 16px;">data inserted successfully!!</p>';
                header('Location:profile.php');
            }
                    else{
                echo  '<p style="color: red;margin-top:10px; background-color: rgba(255, 0, 0, 0.233);padding: 14px;text-align: center;width:100%;border-radius: 16px;">Error while inserting data</p>';                    }
                }
                
                ?>
           
            
    <script>
        function edit_sign_in_details(){
            document.getElementById("email").disabled = false;
            document.getElementById("email").style.backgroundColor = "#eee";
            document.getElementById("email").style.borderRadius = "6px";
            document.getElementById("email").style.borderColor = "blue";
            document.getElementById("password").disabled = false;
            document.getElementById("password").style.backgroundColor = "#eee";
            document.getElementById("password").style.borderRadius = "6px";
            document.getElementById("password").style.borderColor = "blue";
            document.getElementById("save").style.visibility = "visible";
        }
        function edit_personal_details(){
            document.getElementById("save2").style.visibility = "visible";
            document.getElementById("username").disabled = false;
            document.getElementById("username").style.backgroundColor = "#eee";
            document.getElementById("username").style.borderRadius = "6px";
            document.getElementById("username").style.borderColor = "blue";
            
            document.getElementById("Phone").disabled = false;
            document.getElementById("Phone").style.backgroundColor = "#eee";
            document.getElementById("Phone").style.borderRadius = "6px";
            document.getElementById("Phone").style.borderColor = "blue";
            
            document.getElementById("fname").disabled = false;
            document.getElementById("fname").style.backgroundColor = "#eee";
            document.getElementById("fname").style.borderRadius = "6px";
            document.getElementById("fname").style.borderColor = "blue";

            document.getElementById("lname").disabled = false;
            document.getElementById("lname").style.backgroundColor = "#eee";
            document.getElementById("lname").style.borderRadius = "6px";
            document.getElementById("lname").style.borderColor = "blue";
            
            document.getElementById("address").disabled = false;
            document.getElementById("address").style.backgroundColor = "#eee";
            document.getElementById("address").style.borderRadius = "6px";
            document.getElementById("address").style.borderColor = "blue";
        }
        function car_details(){
            document.getElementById("Company").disabled = false;
            document.getElementById("Company").style.backgroundColor = "#eee";
            document.getElementById("Company").style.borderRadius = "6px";
            document.getElementById("Company").style.borderColor = "blue";
            
            document.getElementById("Model").disabled = false;
            document.getElementById("Model").style.backgroundColor = "#eee";
            document.getElementById("Model").style.borderRadius = "6px";
            document.getElementById("Model").style.borderColor = "blue";
            
            document.getElementById("Year").disabled = false;
            document.getElementById("Year").style.backgroundColor = "#eee";
            document.getElementById("Year").style.borderRadius = "6px";
            document.getElementById("Year").style.borderColor = "blue";
            
            document.getElementById("Color").disabled = false;
            document.getElementById("Color").style.backgroundColor = "#eee";
            document.getElementById("Color").style.borderRadius = "6px";
            document.getElementById("Color").style.borderColor = "blue";
            
            document.getElementById("Fuel_Type").disabled = false;
            document.getElementById("Fuel_Type").style.backgroundColor = "#eee";
            document.getElementById("Fuel_Type").style.borderRadius = "6px";
            document.getElementById("Fuel_Type").style.borderColor = "blue";
            
            document.getElementById("Price").disabled = false;
            document.getElementById("Price").style.backgroundColor = "#eee";
            document.getElementById("Price").style.borderRadius = "6px";
            document.getElementById("Price").style.borderColor = "blue";
            
            document.getElementById("Engine_Size").disabled = false;
            document.getElementById("Engine_Size").style.backgroundColor = "#eee";
            document.getElementById("Engine_Size").style.borderRadius = "6px";
            document.getElementById("Engine_Size").style.borderColor = "blue";
            
            document.getElementById("Transmission_Type").disabled = false;
            document.getElementById("Transmission_Type").style.backgroundColor = "#eee";
            document.getElementById("Transmission_Type").style.borderRadius = "6px";
            document.getElementById("Transmission_Type").style.borderColor = "blue";
            
            document.getElementById("City").disabled = false;
            document.getElementById("City").style.backgroundColor = "#eee";
            document.getElementById("City").style.borderRadius = "6px";
            document.getElementById("City").style.borderColor = "blue";

            document.getElementById("save3").style.visibility = "visible";
        }
        function updateTextInput(val) {
          document.getElementById('textInput').value="0$-"+val+"$"; 
        }
    </script>
</body>
</html>