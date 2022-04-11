<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">


<?php
    
    if(!isset($_SESSION['email'])){
      header("Location: login.php");
      exit();
    }

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

    $qtyerror="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (empty($_POST['qty']) || $_POST['qty']<=0) {
        $qtyerror = " * Invalid Quantity: ".$_POST['qty'];
        }
      else{
        $plantname = $_POST['plantname'];
        $qty = $_POST['qty'];
        $sql = "insert into MyPlants values('".$plantname."',".$qty.",'".$_SESSION['email']."');";
        $conn->query($sql);
        header('Location: MyPlants.php');
      }
      }

    $sql = "create table if not exists AllPlants(plantname varchar(255) , sciname varchar(255), primary key(plantname));";
    $conn->query($sql);

    $sql = "create table if not exists MyPlants(plantname varchar(255) , qty int, email varchar(255), primary key(plantname, email), FOREIGN KEY (email) REFERENCES Users(email));";
    $conn->query($sql);

    $sql = "select * from AllPlants;";
    $retval_all=$conn->query($sql);

    $sql = "select * from MyPlants where email='".$_SESSION['email']."';";
    $retval_my=$conn->query($sql);
    
    $arr_all = array();

    while($row = mysqli_fetch_assoc($retval_all)){
      array_push($arr_all, $row['plantname']);
    }

    $arr_my = array();

    while($row = mysqli_fetch_assoc($retval_my)){
      array_push($arr_my, $row['plantname']);
    }

    $reqd_arr = array_diff($arr_all, $arr_my);

    // if(mysqli_num_rows($retval) > 0){
    //   while($row = mysqli_fetch_assoc($retval)){
    //   echo "EMP ID :{$row['EMPLOYEE_ID']} <br> ".
    //   "EMP LNAME : {$row['LAST_NAME']} <br> ".
    //   "--------------------------------<br>";
    // }
    // }else{
    //   echo "0 results";
    // }

?>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="maincss.css">

  <title>New Plant</title>

    <style>

body {
  font-family: "Sofia", sans-serif;
  position: relative;
  text-align: center;
}

#overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
}

html { 
  background: url(newPlantBg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

label {
  display: inline-block;
  width: 140px;
  text-align: right;
}​
</style>
</head>

<body id="overlay" >

  <?php include('header.php'); ?>


    
<h1 style="font-size:28px; color: white; text-align: center; margin-top: 80px;">
        Got a new plant? add that to your plants...
</h1>

<form action="NewPlant.php" method="POST" style="background-color: whitesmoke; width: 60%; display: inline-block; margin-top: 30px; background-color: rgba(0,0,0,0.5);">
  
  <div style="color: white; font-size: 35px; font-weight: bold; margin-top: 20px;">
    New Plant
    </div>
  <div style="float: left; margin-left: 4%;">
  <label for="plant" style="font-size: 24px; margin-top: 37px; color: white; width: 100%;">Choose a plant: </label><br>
  <label for="qty"  style="font-size: 24px; margin-top: 30px; color: white;">Quantity: </label>
  
</div>
<div style="float: right; text-align: left;"></div>
  <select name="plantname" id="plant" style="font-size: 24px;margin-top: 35px; width: 47%;">
  <?php
  foreach($reqd_arr as $ele){
    echo "<option>".$ele."</option>";
  }
  ?>
  </select><br> 

  
  <input id="qty" name="qty" type="number" style="margin-top: 30px; margin-bottom: 30px; width: 45%; font-size: 24px;"><span style="color:red;"><?php echo $qtyerror; ?></span>
  </div>

  <br>
  <input id="add" type="submit"  value="Add" style="margin-bottom: 30px; font-weight: bold; width: 15%; min-width: 80px; padding-top: 2%; padding-bottom: 2%; ">

</form>

</body>
</html>