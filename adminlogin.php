<?php 
include "phpSqlConnect.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:400,700"
  />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="admin/css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="admin/css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="admin/css/templatemo-style.css">
  <!--
  Product Admin CSS Template
  https://templatemo.com/tm-524-product-admin
  -->
    <title>Document</title>
    <style>
        div{
            margin:200px 25%;
            width: 50%;
            background-color: #214e74;
            text-align: center;
            padding: 20px;
        }
        body{
            background-color: #4e657a;

        }
    </style>
</head>
<body>
    <div>
        <h1>login</h1>
        <form method="post">
            <label for="username">username</label>
            <input type="text" name="username" id="username">
            <br><br>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            <br><br>
            <input type="submit" name="submit" value="submit"class="btn btn-primary btn-block text-uppercase">
       
    <?php 
    if(isset($_POST['submit']) && !empty($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql = "SELECT * FROM admin";
        $res = $connection->query($sql);
        while ($row = $res->fetch_assoc() ) {
            if($row['Admin_UserName']==$username && $row['Admin_password']==$password)
            {
                session_start();
                $_SESSION['admin']="true";
                header('location:admin/accounts.php');
            }
            else echo "<span style='color:red;'>EROR :on username or password</span>";          
        }
    }
    
    ?>
     </form>
    </div>
</body>
</html>