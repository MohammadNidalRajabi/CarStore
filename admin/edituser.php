<?php 
include "../phpSqlConnect.php";
session_start();
if(!isset($_SESSION['admin']) || empty($_SESSION['admin']))
{
  header('location:../adminlogin.php');
}
if(isset($_GET['logout'])&& $_GET['logout']=='true')
{
  session_destroy();
  header('location:../adminlogin.php');
}

if(isset($_POST['update']) && !empty($_POST['update']))
{
    $userid=$_POST['userid'];
    $sql = "SELECT * FROM `user` WHERE `User_id`='$userid'";
    $res = $connection->query($sql);
    while ($row = $res->fetch_assoc() )
    {
      $User_UserName=$row['User_UserName'];
      $User_Password=$row['User_Password'];
      $User_Email=$row['User_Email'];
      $User_gender=$row['User_gender'];
      $User_phone=$row['User_phone'];
      $User_Fname=$row['User_Fname'];
      $User_Lname=$row['User_Lname'];
      $User_address=$row['User_address'];
    }
}
else
{
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts - Product Admin Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <div class="" id="home">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">edit product</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            
            
            <li class="nav-item">
              <a class="nav-link active" href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
           
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link d-block" href="accounts.php?logout=true">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
        <!-- row -->
        <div class="row tm-content-row">
          
          <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form class="tm-signup-form row" method="post">
                <div class="form-group col-lg-12">
                  <label for="name">username</label>
                  <input
                    id="username"
                    name="username"
                    type="text"
                    class="form-control validate"
                    value="<?php echo $User_UserName; ?>"
                  />
                </div>
                <input type="hidden" name="userid"value="<?php echo $_POST['userid']?>">
                <div class="form-group col-lg-6">
                  <label for="email">user Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                    value="<?php echo $User_Email ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">user Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                    value="<?php echo $User_Password; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">user phone</label>
                  <input
                    id="phone"
                    name="phone"
                    type="number"
                    class="form-control validate"
                    value="<?php echo $User_phone; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="address">user address</label>
                  <input
                    id="address"
                    name="address"
                    type="tel"
                    class="form-control validate"
                    value="<?php echo $User_address; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="fname">user first name</label>
                  <input
                    id="fname"
                    name="fname"
                    type="text"
                    class="form-control validate"
                    value="<?php echo $User_Fname; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="lname">user last name</label>
                  <input
                    id="lname"
                    name="lname"
                    type="text"
                    class="form-control validate"
                    value="<?php echo $User_Lname; ?>"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label class="tm-hide-sm">&nbsp;</label>
                 <input type="submit"  name="updateuserinfo"class="btn btn-primary btn-block text-uppercase">
                </div>
              </form>
              <?php 
              if(isset($_POST['updateuserinfo'])&& !empty($_POST['updateuserinfo']))
              {
                $username=$_POST['username'];
                $userid=$_POST['userid'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $sql = "UPDATE `user` SET `User_UserName`='$username',`User_Password`='$password',`User_Email`='$email',`User_phone`='$phone',`User_Fname`='$fname',`User_Lname`='$lname',`User_address`='$address' WHERE `User_id`='$userid'";

                if ($connection->query($sql) === TRUE) {
                  echo '<a href="accounts.php"><button class="btn btn-primary btn-block text-uppercase">back</button></a>';
                } else {
                  echo "Error updating record: " . $connection->error;
                }
              }
              
              ?>
            </div>
          </div>
        </div>
      </div>
      <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
          </p>
        </div>
      </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
