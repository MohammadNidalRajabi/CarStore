<?php
include 'account management\var.php';
include 'phpSqlConnect.php';
?>
<?php

    session_start();
if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id']))
    {
        $ok=true;
        $userid=$_SESSION['user_id'];
        $sqll="SELECT * FROM user WHERE User_id=$userid";
    }
    else
    {
       
    }
    ?>

<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cars</title>
    <link rel="icon" href="images\logo3.png">
    <link rel="stylesheet" href="CSS11.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>

        label{
            margin-left:6px;
           
        }
        input{
            margin-bottom: 10px;
        }
        </style>
    
</head>
<body>
    




    <div class="header">

    
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="images/logo3.png" width="100px">
            </div>
            <nav>
                <ul  list-style: none;>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="sellcar.php">Sell your car</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <?php
                   
                    if($ok==true)
                    {
                        echo '<li><a href="profile.php">Account</a></li>';

                    }
                    else 
                    {
                        echo '<li><a href="account management\sign_in.php">Account</a></li>';

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
        </div>
  
</div>

<div class="categories">
    <div class="small-container">
    <h2 class="title">All Cars</h2>
    <div class="row">

       <?php
    if(isset($_POST['search']) && !empty($_POST['search']))
    {

    
    

    
           $x=0;

           $maxid="SELECT MAX(Car_id) AS carid FROM car_post";
           $ress = $connection->query($maxid);
           while ($rows = $ress->fetch_assoc()) {
               $x=$rows['carid'];
           }
           for($i=0;$i<=$x;$i++)
           {

               $result="SELECT * FROM car_post WHERE Car_id=$i" ;
                $res = $connection->query($result);
                $row = $res->fetch_assoc();
                
               $result1="SELECT * FROM cars_photo WHERE Car_Id=$i" ;
           $res1 = $connection->query($result1);
           $row1 = $res1->fetch_assoc();

           if(isset( $_POST['car_name']) && !empty($_POST['car_name']) && $_POST['car_name']!=$row['Car_Name'])
           continue;

           if(isset( $_POST['car_model']) && !empty($_POST['car_model']) && $_POST['car_model']!=$row['Model'])
           continue;

           if(isset( $_POST['car_year']) && !empty($_POST['car_year']) && $_POST['car_year']!=$row['Year'])
           continue;

           if(isset( $_POST['car_color']) && !empty($_POST['car_color']) && $_POST['car_color']!=$row['Color'])
           continue;

           if(isset( $_POST['fuel_type']) && !empty($_POST['fuel_type']) && $_POST['fuel_type']!=$row['Fuel_Type'])
           continue;

           if(isset( $_POST['Engine_Size']) && !empty($_POST['Engine_Size']) && $_POST['Engine_Size']!=$row['Engine_Size'])
           continue;

           if(isset( $_POST['Transmission_Type']) && !empty($_POST['Transmission_Type']) && $_POST['Transmission_Type']!=$row['Transmission_Type'])
           continue;

           if(isset( $_POST['City']) && !empty($_POST['City']) && $_POST['City']!=$row['City'])
           continue;

           if(isset( $_POST['max_price']) && !empty($_POST['max_price']) && $_POST['max_price']!=$row['Price'])
           continue;

            if($row1['Photo_Link']!=""&& $row['Accepted']==1)
            {

               
                {
                    
                    {
                        ?>
                        <div class="col-4">
           <a href="viewcar.php?carid=<?php echo $row1['Car_Id'] ?>"><img src="<?php echo $row1['Photo_Link'];?>" > </a>
           <h4><?php echo $row['Car_Name']."-".$row['Model']      ?></h4>
           <br>

           <div class="rating">
               <i class="fa fa-star" ></i>
               <i class="fa fa-star" ></i>
               <i class="fa fa-star" ></i>
               <i class="fa fa-star" ></i>
               <i class="fa fa-star-o" ></i>
           </div>
           <p><?php echo $row['Price']."$"     ?></p>
           </div>
                        <?php
                    }
                }
    //             else
    //             {

                
    //        ?>
            
   
    //    <?php
    //        }
}}
        }
           ?>
       </div>


   </div>


</div>





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
    
    
</body>
</html>