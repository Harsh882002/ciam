<?php
// $ini_params = parse_ini_file("../config/config.ini");

$servername = "192.168.1.111";
$username = "zazpi";
$password = "&UJMmju7";
$dbname = "zazpi";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

?>