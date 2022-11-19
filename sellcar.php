<?php 
  include "phpSqlConnect.php";
  include 'account management\var.php';
  $show="hidden";
  session_start();
  if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])||(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) )
  {
  }
  else
  {
    header("location:account management\sign_in.php");
  }
$show="hidden";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Dashboard HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="admin/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="admin/jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="admin/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  <style>
    body{
      background-color: white;
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
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input,select{
  width: 350px !important;
}
label{
  text-align: center !important;
  display: block !important;
}

  </style>
  </head>

  <body>
    <div class="navbar" >
                <nav >
                    <img src="images/logo3.png" width="100px" style="float: left;position: absolute;top: 0%;left: 40px;">
                    <ul style="width:100%" style="position:relative;display: flex;align-content: flex-end;">
                    <li><a href="main.php">Home</a></li>
                    <li><a href="">Sell your car</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <?php 
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
    <div class="container tm-mt-big tm-mb-big" >
      <div class="row">
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto" style="">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto" >
            <div class="row">
              <div class="col-12">
                <h1 style="text-align:center;color:white" >Add Car</h1>
                <hr style="background-color:white">
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-12 col-lg-12 col-md-12">
                <form action=""id="save" class="tm-edit-product-form" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group mb-3 col-md-12" style="text-transform: capitalize;display:flex;justify-content: space-evenly;">
                  <div >
                    <label for="name">Car Name</label>
                    <input id="Name"name="Name"type="text"class="form-control validate"required />
                    </div>
                    <div>
                    <label for="model" >car model</label>
                    <input id="model"name="model"type="text"class="form-control validate"required/>
                    </div>
                  </div>
                  
                  <div class="form-group mb-3 col-md-12" style="text-transform: capitalize;display:flex;justify-content: space-evenly;">
                  <div >
                    <label for="year">Car year</label>
                    <input id="year"name="year"type="number"class="form-control validate"required />
                    </div>
                    <div>
                    <label for="color" >car color</label>
                    <input id="color"name="color"type="text"class="form-control validate"required/>
                    </div>
                  </div>

                  <div class="form-group mb-3 col-md-12" style="text-transform: capitalize;display:flex;justify-content: space-evenly;">
                    <div >
                      <label for="fuel_type">car fuel type</label>
                      <select name="fuel_type" id="fuel_type" class="form-control validate"style="padding:0;width:220px;text-align:center">
                        <option value="gasoline">gasoline</option>
                        <option value="diesel">diesel</option>
                        <option value="electric">electric</option>
                      </select>
                      </div>
                      <div>
                        <label for="Accessories" >Accessories</label>
                        <input id="Accessories"name="Accessories"type="text"class="form-control validate"required/>
                        </div>
                      </div>

                  <div class="form-group mb-3 col-md-12" style="text-transform: capitalize;display:flex;justify-content: space-evenly;">
                    <div >
                      <label for="Price">car Price</label>
                      <input id="Price"name="Price"type="number"class="form-control validate"required/>
                      </div>
                      <div>
                        <label for="Engine_Size" > car Engine Size</label>
                        <input id="Engine_Size"name="Engine_Size"type="text"class="form-control validate"required/>
                        </div>
                      </div>

                  <div class="form-group mb-3 col-md-12" style="text-transform: capitalize;display:flex;justify-content: space-evenly;">
                    <div >
                      <label for="Transmission_Type">car Transmission Type</label>
                      <select name="Transmission_Type" id="Transmission_Type" class="form-control validate"style="padding:0;width:220px;text-align:center">
                        <option value="gear">gear</option>
                        <option value="automatic">automatic</option>
                      </select>                      
                    </div>
                      <div>
                        <label for="City" >car City</label>
                        <select name="City" id="City" class="form-control validate"style="padding:0;width:220px;text-align:center">
                          <option value="Jerusalem">Jerusalem</option>
                          <option value="Gaza">Gaza</option>
                          <option value="Khan_Yunis">Khan Yunis</option>
                          <option value="Jabalya">Jabalya</option>
                          <option value="Hebron">Hebron</option>
                          <option value="Nablus">Nablus</option>
                          <option value="Rafah">Rafah</option>
                          <option value="Tulkarm">Tulkarm</option>
                          <option value="Qalqilyah">Qalqilyah</option>
                          <option value="Yuta">Yuta</option>
                          <option value="Bayt_Hanun">Bayt Hanun</option>
                          <option value="An_Nusayrat">An Nusayrat</option>
                          <option value="Janin">Janin</option>
                          <option value="Bethlehem">Bethlehem</option>
                          <option value="Ramallah">Ramallah</option>
                          <option value="hara_altahta">hara altahta</option>
                        </select>                           
                      </div>
                      </div>
                      
                      <br>
                      <input type="text" value="<?php echo $_SESSION['user_id'] ?>"name="userid" style="display: none;">
                      <input type="submit" value="submit"class="btn btn-primary btn-block mx-auto"id="save" name="save" >
                      </div>
            
                      <?php 
                      if(isset($_POST['save']) && !empty($_POST['save']))
                      {
                        
                        $name= strtolower($_POST['Name']);
                        $model=strtolower($_POST['model']);
                        $year=$_POST['year'];
                        $color=strtolower( $_POST['color']);
                        $fuel_type=$_POST['fuel_type'];
                        $Accessories=strtolower($_POST['Accessories']);
                        $Price=$_POST['Price'];
                        $Engine_Size=$_POST['Engine_Size'];
                        $Transmission_Type=$_POST['Transmission_Type'];
                        $City=$_POST['City'];
                        $userid=$_POST['userid'];
                        if((isset($_SESSION['admin']) && !empty($_SESSION['admin'])))
                        {
                          $userid=15;
                        }
                        $sql="INSERT INTO car_POST ( Car_Name,Model, Year, Color, Fuel_Type, Accessories, Price, Engine_Size, Transmission_Type, City,User_id) VALUES ( '$name', '$model', '$year', '$color', '$fuel_type', '$Accessories', '$Price', '$Engine_Size', '$Transmission_Type', '$City','$userid');";
                        if($connection->query($sql)===TRUE)
                        {
                        $show="";
                        $maxid="SELECT MAX(Car_id) AS carid FROM car_post";
                        $ress = $connection->query($maxid);
                        while ($rows = $ress->fetch_assoc()) {
                            $x=$rows['carid'];
                        }
                        $_SESSION['carid']=$x;
                        
                        }
                        else{
                        // False
                          echo "Error while inserting data";
                        }
                        
        

                      }
                          
?>
                          
                        </form>
                        <a href="addimgcar.php" id="image" <?php echo $show ?>><button autofocus>add image</button></a>       
            
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>