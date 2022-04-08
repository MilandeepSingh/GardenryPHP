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
    <title>All Plants</title>

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
  background: url(allPlantsBg.jpg) no-repeat center center fixed; 
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
        Look out for new plants to be added to your space...
</h2>


<div id='bag' class="container-fluid">
  <div class="row" id="r">

  </div>
</div>

<script>

$(document).ready(function() {
  let xhr = new XMLHttpRequest();
xhr.open('get', 'http://localhost:3001/allplants');
xhr.send();

xhr.onload = function() {
  var obj = JSON.parse(xhr.response);
  for(let i=0; i<obj.length; i++){
  let name = obj[i].plantname
  let sciname = obj[i].sciname
  addNewObj(name+'('+sciname+')', 'images/'+name.toLowerCase()+'.jpg')
  }
}
});


  function addNewObj(name, image){

    var d0 = document.createElement("div");
    var d1 = document.createElement("div");
    var img = document.createElement("img");
    var text = document.createTextNode(name);

    img.setAttribute('class', 'fill');
    img.setAttribute('src', image)
    img.setAttribute('alt', 'Image')

    d0.setAttribute("class","col");
    d1.setAttribute("class", 'imgCell');

    d1.appendChild(img);
    d0.appendChild(d1);
    d0.appendChild(text);

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
