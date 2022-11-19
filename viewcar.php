<?php 
  include "phpSqlConnect.php";
  session_start();
  if(isset($_GET['carid']) && ! empty($_GET['carid']))
{
  $carid=$_GET['carid'];
}
else
{
  header('location:main.php');
}
session_start();
$sql="SELECT * FROM car_post WHERE `Car_id`='$carid'";
$res = $connection->query($sql);
while ($row = $res->fetch_assoc() ) {
  $carviews=$row['car_views'];
  $price= $row['Price'];
  $Car_Name= $row['Car_Name'];
  $Model= $row['Model'];
  $Year= $row['Year'];
  $Color= $row['Color'];
  $Fuel_Type= $row['Fuel_Type'];
  $Accessories= $row['Accessories'];
  $Engine_Size= $row['Engine_Size'];
  $Transmission_Type= $row['Transmission_Type'];
  $City= $row['City'];
  $User_id = $row['User_id'];
  if($row['Accepted']==0 && $_SESSION['admin']==false)
  {
    header('location:main.php');
  }
}
$sql="SELECT `User_UserName`,`User_Email`,`User_phone` FROM `user` WHERE `User_id`=$User_id";
$res = $connection->query($sql);
while ($row = $res->fetch_assoc() ) {
  $User_UserName=$row['User_UserName'];
  $User_Email=$row['User_Email'];
  $User_phone=$row['User_phone'];
}
$carviews=$carviews+1;
$updateviews = "UPDATE `car_post` SET `car_views` ='$carviews'  WHERE `car_post`.`Car_id` = '$carid'";

if ($connection->query($updateviews) === TRUE) {
  
} else {
  
}


?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Sample Product">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="CSS11.css"> 

<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.29.1, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <style>
      * {box-sizing:border-box}
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
/* Slideshow container */
.slideshow-container {
width: 100%;
position: relative;
margin: auto;
height: 200px;
}

/* Hide the images by default */
.mySlides {
display: none;
}
.dot {
cursor: pointer;
height: 15px;
width: 15px;
margin: 0 2px;
background-color: #bbb;
border-radius: 50%;
display: inline-block;
transition: background-color 0.6s ease;
}
.imgg{
width: 500px !important;
height: 200px !important;
}

.active, .dot:hover {
background-color: #717171;
}

/* Fading animation */
.fade {
-webkit-animation-name: fade;
-webkit-animation-duration: 1.5s;
animation-name: fade;
animation-duration: 1.5s;
}

@-webkit-keyframes fade {
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade {
from {opacity: .4}
to {opacity: 1}

}
    </style>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body">
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
    <section class="u-clearfix u-section-1" id="carousel_e691">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-sheet-1"><!--product--><!--product_options_json--><!--{"source":""}--><!--/product_options_json--><!--product_item-->
        <div class="u-container-style u-expanded-width u-product u-product-1">
          <div class="u-container-layout u-valign-bottom-lg u-valign-bottom-md u-valign-top-xl u-container-layout-1"><!--product_image-->
            <div class="slideshow-container" >
                <!-- Full-width images with number and caption text -->
            <?php  
              $sql="SELECT Photo_Link FROM cars_photo WHERE `Car_Id`=$carid";
              $res = $connection->query($sql);
              while ($row = $res->fetch_assoc() )
              {
                echo "";
              
              ?>
                  <div class="mySlides fade imgg">
                    
                    <img src="<?php echo $row['Photo_Link'] ?>" style="height: 350px;width:500px;">
                
                  </div>
                  <?php } ?>

              </div>            <div class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
              <div class="u-container-layout u-valign-middle u-container-layout-2"><!--product_title-->
                <h2 class="u-product-control u-text u-text-default u-text-1">
                  <a class="u-product-title-link" href="#"><!--product_title_content--> <?php  echo $Car_Name." ". $Model." ". $Year ?><!--/product_title_content--></a>
                </h2><!--/product_title--><!--product_price-->
                <div class="u-product-control u-product-price u-product-price-1">
                  <div class="u-price-wrapper u-spacing-10"><!--product_old_price-->
                    <div class="u-hide-price u-old-price" style="text-decoration: line-through !important;"><!--product_old_price_content-->$12<!--/product_old_price_content--></div><!--/product_old_price--><!--product_regular_price-->
                    <div class="u-price" style="font-size: 1.875rem; font-weight: 700;"><!--product_regular_price_content--><?php echo $price ?>$<!--/product_regular_price_content--></div><!--/product_regular_price-->
                  </div>
                </div><!--/product_price--><!--product_content-->
                <div class="u-product-control u-product-desc u-text u-text-2"><!--product_content_content-->
                <p style="text-align:left">color:<?php echo $Color ?> <br>fuel type : <?php echo $Fuel_Type ?><br> Accessories: <?php echo $Accessories ?><br> engine size: <?php echo $Engine_Size ?> <br> location:<?php echo $City ?>  </p><!--/product_content_content-->
                <hr>
                <h3>user info </h3>
                <p style="text-align:left">name:<?php echo $User_UserName ?><br>email:<?php echo $User_Email ?><br>phone: <?php echo $User_phone ?></p>
                <hr>
              </div><!--/product_content--><!--product_button--><!--options_json--><!--{"clickType":"add-to-cart","content":""}--><!--/options_json-->
              </div>
            </div>
          </div>
        </div><!--/product_item--><!--/product-->
      </div>
    </section>
    <!-----------------footer---------------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Downlod Our App</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus id odio deleniti ullam porro incidunt est, beatae eaque deserunt quis harum eum iste possimus sequi totam dolore soluta optio laudantium!</p>
                <div class="app-logo">
                    <img src="images/play-store.png" >
                    <img src="images/app-store.png" >
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/logo3.png" >
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus id odio deleniti ullam porro incidunt est, beatae eaque deserunt quis harum eum iste possimus sequi totam dolore soluta optio laudantium!</p>
                
            </div>
            <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
                <li>Coupons</li>
                <li>Bolg Post</li>
                <li>Return Policy</li>
                <li>Join Affiliate</li>

            </ul> 
                
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter </li>
                    <li>Insagram</li>
                    <li>Youtube</li>
    
                </ul> 
                    
                </div>
            
        </div>
        <hr>
        <br>
        <p>Copuright 2021-AL habbad&&zaid &copy; </p>
    </div>
</div>
    
    

    <script>
       var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3500); // Change image every 2 seconds
}
    </script>
  </body>
</html>