<?php
session_start();

$plantname = $_POST['plantname'];
$qty = $_POST['qty'];


$host = 'localhost:3306';
$user = 'root';
$pass = '';
$conn = mysqli_connect($host, $user, $pass);
if(!$conn){
die('Could not connect: '.mysqli_connect_error());
}

$dbname = "GardenryPHP";
$conn->query("create database if not exists ".$dbname.";");
$conn->query("use ".$dbname);


if ($qty>0){
    $sql = "update MyPlants set qty = ".$qty." where plantname = '".$plantname."' and email = '".$_SESSION['email']."';";
    $conn->query($sql);
}
elseif ($qty==0){
    $sql = "delete from MyPlants where plantname = '".$plantname."' and email = '".$_SESSION['email']."';";
    $conn->query($sql);
}

header("Location: MyPlants.php");
exit();
?>