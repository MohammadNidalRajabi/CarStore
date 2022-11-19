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
  <meta http-equiv='refresh' content='2'>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Manage Ads Page - Admin HTML Template</title>
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
              <a class="nav-link" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
            <li class="nav-item active">
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
    <center>
    <div style="width:100%" class="col-sm-12 col-md-12 col-lg-8 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table  class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>

                    <th scope="col">Link</th>
                    <th scope="col">Set Defult</th>
                    <th scope="col">Update advertisements </th>
                  </tr>
                </thead>
                <tbody>
                 
                  <?php 
                  
                  $sql = "SELECT * FROM `ads` ";
                  $res = $connection->query($sql);
                  while ($row = $res->fetch_assoc() ) {
                    
                    ?>
                       <tr>
                         

                         
                  
                    <td> <a href="<?php  echo $row['adslink']  ?>" target="_blank" > <button>Link</button>  </a> </td>
                    
                  
                  <td> <form  method="post">
                  <input type="hidden" name="postid" value="<?php echo $row['id'] ?>">
                  <input type="submit" value="Set Defult" name="delete">
                  </form>
                </td>
                  <?php 
                  if(isset($_POST['delete']) && !empty($_POST['delete']))
                  {
                    $carid=$_POST['postid'];
                    $sql12="UPDATE ads SET adslink='adsimg/banner10.gif' WHERE id=$carid ";
                        
                    if ($connection->query($sql12) === TRUE) {
                      
                     break;
                    } else {
                      echo "Error updating record: " . $connection->error;
                    }
                     break;
                    } else {
                      echo "Error updating record: " . $connection->error;
                    }

                  
                ?>
                <td>
                </div>
            <!-- table container -->
            <a
              href="adsimg.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new advertisements</a>
          </div>
                </td>
                  <?php }?>
              </form>
              
              
                </tbody>
             
              </table>
            </div>
            <!-- table container -->

        </div>
            <!-- table container -->
          
              
                  </input>
          </div>
        </div>
      </div>
    </div>
    </center>
    
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