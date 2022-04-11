<?php 
  session_start();
?>
<script>
  var selected="";
  var qty=0;
</script>
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

    $sql = "create table if not exists MyPlants(plantname varchar(255) , qty int, email varchar(255), primary key(plantname, email), FOREIGN KEY (email) REFERENCES Users(email));";
    $conn->query($sql);

    $sql = "select * from MyPlants where email='".$_SESSION['email']."';";
    $retval=$conn->query($sql);

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
    
  <title>My Plants</title>

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
  background: url(myPlantsBg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  overflow: visible;
}
        </style>
</head>

<body id="overlay">
  <?php include('./header.php'); ?>

<h2 style="font-size:22px; color: white; text-align: center; margin-top: 80px; margin-bottom: 30px;">
        Manage your precious plant collection here...
        <?php
        if(mysqli_num_rows($retval)==0){
          echo "<br><br>Go to New Plant to add your first plants...";
        }

        ?>
</h2>

<div id='bag' class="container-fluid">
  <div class="row" id="r">
   
  <?php
        while($row = mysqli_fetch_assoc($retval)){
        $src_tag = "src='images/".strtolower($row['plantname']).'.jpg'."'";
        echo "<div class='col' id='".$row['plantname']."'>".
        "<div class='imgCell'>".
        "<img ".$src_tag." alt='Image' class='fill'>".
        "</div>".
        $row["plantname"].'('.$row['qty'].')'.
        "</div>";
      
    

        echo '<script>
            $("#'.$row['plantname'].'").click(function(){
              selected = "'.$row['plantname'].'";
              qty = '.$row['qty'].';
              $("#exampleModal").modal("show");
              document.getElementById("plantname").value = selected;
              document.getElementById("heading").innerHTML = selected;
              document.getElementById("qty").value = qty;
            })
        </script>';

  }

?>

  </div>

</div>

<!-- <button onclick="addNewObj('Dummy Plant', 'images/dummy.png')">DUMMY PLANT</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
    <form action="modifyQuantity.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="heading"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <input type="hidden" id="plantname" name="plantname" value="demo">
      <div class="modal-body" id="main">
        <span>New quantity: </span><input type="number" placeholder="Enter new quantity" name="qty" id="qty">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



</body>
</html>