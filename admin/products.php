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
    <title>Product Page - Admin HTML Template</title>
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
              <a class="nav-link active" href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>
            

            <li class="nav-item">
              <a class="nav-link" href="accounts.php">
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
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">car name</th>
                    <th scope="col">car model</th>
                    <th scope="col">car color</th>
                    <th scope="col">car year </th>
                    <th scope="col">link</th>
                    <th scope="col">Accept</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <?php 
                  
                  $sql = "SELECT * FROM `car_post` WHERE `Accepted`=0";
                  $res = $connection->query($sql);
                  while ($row = $res->fetch_assoc() ) {
                    
                    ?>
                       <tr>
                         

                         
                    <td class="tm-product-name"><?php  echo $row['Car_Name']  ?></td>
                    <td><?php  echo $row['Model']  ?></td>
                    <td><?php  echo $row['Color']  ?></td>
                    <td><?php  echo $row['Year']  ?></td>
                   <td><a href="../viewcar.php?carid=<?php  echo $row['Car_id']  ?>"><button>see</button></a></td>
                  <td> <form  method="post"><input type="hidden" value="<?php echo $row['Car_id'] ?>"  name="carid">
                <input type="submit" value="accsept" name="update">
                </form></td>
                <?php 
                  if(isset($_POST['update']) && !empty($_POST['update']))
                  {
                    $carid=$_POST['carid'];
                      $sql = "UPDATE `car_post` SET `Accepted` = '1' WHERE `car_post`.`Car_id` =$carid ;";

                    if ($connection->query($sql) === TRUE) {
                      echo "<meta http-equiv='refresh' content='1'>";
                     break;
                    } else {
                      echo "Error updating record: " . $connection->error;
                    }

                  }
                ?>
                  </tr>
                    <?php
                    }
                  
                  ?>
              </form>
                </tbody>
              </table>
            </div>
            <!-- table container -->
           
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">car name</th>
                    <th scope="col">car model</th>
                    <th scope="col">car color</th>
                    <th scope="col">car year </th>
                    <th scope="col">link</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <?php 
                  
                  $sql = "SELECT * FROM `car_post` ";
                  $res = $connection->query($sql);
                  while ($row = $res->fetch_assoc() ) {
                    
                    ?>
                       <tr>
                         

                         
                    <td class="tm-product-name"><?php  echo $row['Car_Name']  ?></td>
                    <td><?php  echo $row['Model']  ?></td>
                    <td><?php  echo $row['Color']  ?></td>
                    <td><?php  echo $row['Year']  ?></td>
                   <td><a href="../viewcar.php?carid=<?php  echo $row['Car_id']  ?>"><button>see</button></a></td>
                  <td> <form  method="post">
                  <input type="hidden" name="postid" value="<?php echo $row['Car_id'] ?>">
                  <input type="submit" value="delete" name="delete">
                  </form>
                </td>
                  <?php 
                  if(isset($_POST['delete']) && !empty($_POST['delete']))
                  {
                    $carid=$_POST['postid'];
                    $sql="DELETE FROM cars_photo WHERE cars_photo.Car_Id = $carid";
                    if ($connection->query($sql) === TRUE) {
                         $sql2 = "DELETE FROM `car_post` WHERE `car_post`.`Car_id` =$carid ";
                    if ($connection->query($sql2) === TRUE) {
                      echo "<meta http-equiv='refresh' content='3'>";
                     break;
                    } else {
                      echo "Error updating record: " . $connection->error;
                    }
                     break;
                    } else {
                      echo "Error updating record: " . $connection->error;
                    }

                  }
                ?>
                  <?php }?>
              </form>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="../sellcar.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
          </div>
        </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button>
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
   
  </body>
</html>