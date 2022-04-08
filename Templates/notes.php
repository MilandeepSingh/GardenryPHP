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
    
  <title>My Notes</title>

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
  background: url(notes.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>

<body id="overlay">
    
  <?php include('header.php'); ?>


<h2 style="font-size:22px; color: white; text-align: center; margin-top: 80px;">
        Manage your gardening related notes here...
</h2>


<div id='bag' class="container-fluid">
  <div class="row" id="r">
    
    <div class="col">
      <div class="noteCell">
        I harvested a 5-kg pumpkin today <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        16:45, 19-07-2021
    </div>
    </div>
    
    <div class="col">
      <div class="noteCell">
        My chilli plants got powdery mildew today.
        <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        7:15, 10-06-2020
    </div>
    </div>

    <div class="col">
      <div class="noteCell">
        Today I got the first harvest of spinach.
        <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        08:55, 19-05-2020
    </div>
    </div>

    <div class="col">
      <div class="noteCell">
        Rainstorm destroyed my neem tree today.
        <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        07:31, 07-02-2020
    </div>
    </div>

    <div class="col">
      <div class="noteCell">
        I pruned my peach tree today
        <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        12:01, 09-02-2020
    </div>
    </div>

    <div class="col">
      <div class="noteCell">
        I planted an avocado tree today. It is of hass variety. It is expected to fruit in 3 years. Nursery contact no. +91 9999999999
        <!-- <img class="fill" src="images/tulsi.jpg" alt="Image"> -->
      </div>
      <div style="text-align: right; width: 100%; color: blanchedalmond;">
        17:45, 12-12-2019
    </div>
    </div>

  </div>

</div>

<!-- <button onclick="addNewObj('Dummy Note', 'Dummy time', 'Dummy date')">DUMMY PLANT</button> -->

<script>


$(document).ready(function() {

let xhr = new XMLHttpRequest();
xhr.open('get', 'http://localhost:3001/notes');
xhr.send();

xhr.onload = function() {
  var obj = JSON.parse(xhr.response);
  for(let i=0; i<obj.length; i++){
  let note = obj[i].note
  note = note.replaceAll("\n", "<br/>")
  let sma = obj[i].sma
  let date = sma.slice(0, 10);
  let time = sma.slice(11,16)
  addNewObj(note, date, time)
  console.log(note, date, time)
  }
}
});


  function addNewObj(name, date, time){


  var d0 = document.createElement("div");
    var d1 = document.createElement("div");
    var d2 = document.createElement("div");


    var text1 = name;
    var text2 = document.createTextNode(time+", ");
    var text3 = document.createTextNode(date);

    d0.setAttribute("class", "col");
    d1.setAttribute("class", 'noteCell');
    d2.setAttribute("class", "subNote")

    d0.appendChild(d1);
    d0.appendChild(d2)
    d1.innerHTML=text1;
    d2.appendChild(text2);
    d2.appendChild(text3)

    // d.innerHTML= '<div class="col">'+
    //   '<div class="imgCell">'+
    //     '<img class="fill" src="images/customer-service.jpg" alt="Image">'+
    //   '</div>'+
    //   'Plant name'+
    // '</div>'
    
    document.getElementById('r').appendChild(d0);
  }
</script>
  
</body>
</html>