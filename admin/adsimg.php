<?php 
    include "../phpSqlConnect.php";
    include 'account management\var.php';
    session_start();
    if(isset($_SESSION['user_id'])&& !empty($_SESSION['user_id'])||(isset($_SESSION['admin']) && !empty($_SESSION['admin'])) )
    {
    }
    else
    {
      header("location:account management\sign_in.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
        .link button{
            border-radius:10px;
            border:none;
            font-size:20px;
            background-color:gray;
            padding:6px;
            cursor: pointer;
        }
        form{
            margin:240px 200px;
            text-align:center;
        }
        body{
            background:radial-gradient(#fff,#2a9ae6) ;
        }
    </style>
</head>
<body>
   
    <form action="" method="post" enctype="multipart/form-data">
        <h3>please click the button to enter images</h3>
        <input type="file" name="fileToUpload">
        
        <br>
        <label for="cars">Choose a advertising area:</label>

        <select name="area" >
        <option value="1">Area 1</option>
        <option value="2">Area 2</option>
        <option value="3">Area 3</option>
        
        </select>
        <br>
        <input type="submit" value="uplode file"name="submit" onclick="show()">
    </form>
    <?php
    

            if(isset($_POST['submit']) && !empty($_POST['submit']))
            {
                $Area=$_POST['area'];
                echo $Area;

         
        $target_dir = "adsimg/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $carid=$_SESSION['id'];
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
         
            $sql="UPDATE ads SET adslink='$target_file',id='$Area' WHERE id=$Area ";
            if($connection->query($sql)===TRUE)
{
// True
    echo "Instered Successfully!<br> click if you want to add more images<br>";
    echo '    <a href="manageads.php" class="link"><button >back to main</button></a>';

}
else{
    echo "Sorry, there was an error uploading your file.";
}
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }
?>
</body>
</html>