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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accoubts Page - Admin HTML Template</title>
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
  <style>
    input,button {
      background-color:#394e64;
      color:white;
      border:none;
      padding:6px 12px;
      border-radius:4px;
    }
  </style>
  </head>

  <body id="reportsPage">
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
              <a class="nav-link " href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="manageads.php">
                <i class="fas fa-bullhorn"></i> Manage Ads
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">user name</th>
                    <th scope="col">user email</th>
                    <th scope="col">user first name</th>
                    <th scope="col">user last name </th>
                    <th scope="col">update</th>
                    <th scope="col">delete </th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM user";
                  $res = $connection->query($sql);
                  while ($row = $res->fetch_assoc() ) {
                  ?>
                  <tr>
                <td class="tm-product-name"><?php echo $row['User_UserName'] ?></td>
                <td class="tm-product-name"><?php echo $row['User_Email'] ?></td>
                <td class="tm-product-name"><?php echo $row['User_Fname'] ?></td>
                <td class="tm-product-name"><?php echo $row['User_Lname'] ?></td>
                <td class="tm-product-name"><form action="edituser.php" method="post">
                  <input type="hidden" name="userid" value="<?php echo $row['User_id'] ?>">
                  <input type="submit" value="update" name="update">
                </form></td>
                <td class="tm-product-name"><form  method="post">
                <input type="hidden" name="userid" value="<?php echo $row['User_id'] ?>">
                <input type="submit" value="delete" name="delete">
                </form></td>
                
                </tr>
                  <?php } ?>
                  <?php 
                if(isset($_POST['delete'])&& !empty($_POST['delete']))
                {
                  $userid=$_POST['userid'];
                  $sql="DELETE FROM `user` WHERE `user`.`User_id` ='$userid'";
                  if ($connection->query($sql) === TRUE)
                  {
                    echo "deleted succssefly";
                    echo "<meta http-equiv='refresh' content='3'>";
                  }
                  else echo "errorr";
                }
                ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
           
           
  
  </body>
</html>