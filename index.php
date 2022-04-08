<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home Page</title>
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


.bg-text {
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 60%;
  padding: 60px;
  min-width: 550px;
  text-align: center;
}    
        html { 
  background: url('images/bodybg.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
        </style>

        
</head>



<body id="overlay">

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand ms-3" href="#">
      <img style="width: 70px;" src="logo/logo.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li></li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Templates/MyPlants.php">My Plants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Templates/AllPlants.php">All Plants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Templates/NewPlant.php">New Plant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Templates/notes.php">My Notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Templates/newNote.php">New Note</a>
        </li>
      </ul>
    </div>
  </nav>



    <div class="bg-text">
    <h2>Welcome to your gardening assistant</h2>
    <h1 style="font-size:70px; color: green; -webkit-text-stroke: 1px white;">GARDENRY</h1>
    <p style='font-size: 25px;'>Life starts when you start a garden</p>
  </div>
</body>

<script>
    /*$( document ).ready(function() {
        console.log("asdasdasd************");
        $("#header").innerhtml = '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">' +
        '<a class="navbar-brand ms-3" href="#">Navbar</a>' + 
        '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">' + 
          '<span class="navbar-toggler-icon"></span>' + 
        '</button>' + 
  
        '<div class="collapse navbar-collapse" id="navbarsExampleDefault">' + 
          '<ul class="navbar-nav mr-auto">' + 
            '<li class="nav-item active">' + 
              '<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>' + 
            '</li>' + 
            '<li class="nav-item">' + 
              '<a class="nav-link" href="#">Link</a>' + 
            '</li>' + 
            '<li class="nav-item">' + 
              '<a class="nav-link disabled" href="#">Disabled</a>' +
            '</li>' + 
            '<li class="nav-item dropdown">' + 
              '<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>' + 
              '<div class="dropdown-menu" aria-labelledby="dropdown01">' + 
                '<a class="dropdown-item" href="#">Action</a>' + 
                '<a class="dropdown-item" href="#">Another action</a>' + 
                '<a class="dropdown-item" href="#">Something else here</a>' + 
              '</div>'  +
            '</li>'  +
          '</ul>' + 
        '</div>' + 
      '</nav>';
    });*/
</script>

</html>