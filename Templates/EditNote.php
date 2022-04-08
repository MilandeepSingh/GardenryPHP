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
    <title>Edit Note</title>

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
  background: url(EditNote.jpg) no-repeat center center fixed; 
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

<h2 style="font-size:22px; color: white; text-align: center;">
        Easy space for you to edit your note...
</h2>

<form style="background-color: whitesmoke; width: 60%; display: inline-block; margin-top: 30px; text-align: center;">
  
   <label for="note" style="width: 90%; font-size: 30px; font-weight: bold; margin-top: 20px; text-align: center;">
    Edit your note here :
    </label>

    <textarea name="note" id="note" cols="30" rows="10" style="text-align: center; margin-top: 30px; margin-bottom: 20px; width: 70%;">gg</textarea>    

    <br>
    <div>
        <button style="margin-bottom: 30px; font-weight: bold; width: 15%; min-width: 80px; padding-top: 2%; padding-bottom: 2%; float: left; margin-left: 28%;">CANCEL</button>
        <button style="margin-bottom: 30px; font-weight: bold; width: 15%; min-width: 80px; padding-top: 2%; padding-bottom: 2%; float: right; margin-right: 28%;">EDIT</button>
    </div>
 
</form>

</body>
</html>