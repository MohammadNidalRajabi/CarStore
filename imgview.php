<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    
</body>
</html>
<?php

include 'Concationp.php';

 $result="SELECT * FROM cars_photo WHERE Car_Id=2" ;
$res = $connection->query($result);

while ($row = $res->fetch_assoc()) {
    

   
    ?>
  
    <img src="<?php echo $row['Photo_Link'];?>" alt="" width="50%">
    <br/>
   

<?php
 
}


?>