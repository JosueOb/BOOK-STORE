<?php
$host = "localhost";
$db = "bookstore";
$user = "homestead";
$password = "secret";

try {
    $connection = new PDO("mysql:host=$host;dbname=$db",$user,$password);
    /*if($connection){
        echo "Connection Successfully";
    }*/
}catch (Exception $e ){
    echo $e->getMessage();
}
