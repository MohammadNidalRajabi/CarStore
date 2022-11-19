
    <?php 
        $servername = "localhost";
        $username="root";
        $password="";
        $dbname="car_system";
        error_reporting(0);
        $connection= new mysqli ($servername,$username,$password,$dbname);
        mysqli_set_charset($connection,"utf8");
        if($connection->connect_error)
        {
            echo "<h1>EROR in connecting database:(  :</h1>";
        }
    ?>



