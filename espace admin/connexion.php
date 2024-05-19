<?php
    try
    {$servername = "localhost";
        $dbname = "my_shop";
        $username = "root";
        $password = "12345";
        $conn = new PDO("mysql:host=$servername;dbname=my_shop",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
       $e->getMessage();
    }
var_dump($conn);  
?>
