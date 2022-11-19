<?php
include 'account management\var.php';
include 'phpSqlConnect.php';
?>
<?php

    session_start();

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

<form action="search.php" style="display:block;margin-top:30px;padding:0 0 0 10px;" method="post">
        <label for="car_name">car name</label>
        <input type="text" name="car_name" id="car_name">
        
        <label for="car_model">car model</label>
        <input type="text" name="car_model" id="car_model">

        <label for="car_year">car year</label>
        <input type="number" name="car_year" id="car_year">

        <label for="car_color">car color</label>
        <input type="number" name="car_color" id="car_color">

        <label for="fuel_type">car fuel type</label>
        <select name="fuel_type" id="fuel_type">
            <option value="gasoline">gasoline</option>
            <option value="diesel">diesel</option>
            <option value="electric">electric</option>
        </select>
<br>
        <label for="Engine_Size">engine size</label>
        <input type="text" id="Engine_Size" name="Engine_Size">
        
        <label for="Transmission_Type">car Transmission Type</label>
                      <select name="Transmission_Type" id="Transmission_Type" class="">
                        <option value="gear">gear</option>
                        <option value="automatic">automatic</option>
                      </select>  

        <label for="City" >car City</label>
                        <select name="City" id="City" class=""style="">
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
                        <label for="max_price"> max price </label>
                        <input type="text" name="max" id="max">
                        <input type="submit" value="search" name="search">
    </form>
<div class="categories">
    <div class="small-container">
    <h2 class="title">All Cars</h2>
    <div class="row">

       <?php
    if(isset($_POST['search']) && !empty($_POST['search']))
    {

    }
    else
    {

    
           $x=0;

           $maxid="SELECT MAX(Car_id) AS carid FROM car_post";
           $ress = $connection->query($maxid);
           while ($rows = $ress->fetch_assoc()) {
               $x=$rows['carid'];
           }
           for($i=0;$i<=$x;$i++)
           {

               $result1="SELECT * FROM cars_photo WHERE Car_Id=$i" ;
           $res1 = $connection->query($result1);
           $row1 = $res1->fetch_assoc();
           $result="SELECT * FROM car_post WHERE Car_id=$i" ;
            $res = $connection->query($result);
            $row = $res->fetch_assoc();
            if($row1['Photo_Link']!=""&& $row['Accepted']==1)
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