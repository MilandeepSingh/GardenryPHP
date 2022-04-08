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

<form style="background-color: whitesmoke; width: 60%; display: inline-block; margin-top: 30px; background-color: rgba(0,0,0,0.5);">
  
  <div style="color: white; font-size: 35px; font-weight: bold; margin-top: 20px;">
    New Plant
    </div>
  <div style="float: left; margin-left: 4%;">
  <label for="plant" style="font-size: 24px; margin-top: 37px; color: white; width: 100%;">Choose a plant: </label><br>
  <label for="qty"  style="font-size: 24px; margin-top: 30px; color: white;">Quantity: </label>
  
</div>
<div style="float: right; text-align: left;"></div>
  <select name="plant" id="plant" style="font-size: 24px;margin-top: 35px; width: 47%;">
  </select><br>

  <script>
    var allplants_list=[];
    var myPlants_list=[];
    $(document).ready(function() {
      let xhr = new XMLHttpRequest();
    xhr.open('get', 'http://localhost:3001/allplants');
    xhr.send();

    xhr.onload = function() {
      var obj = JSON.parse(xhr.response);
      for(let i=0; i<obj.length; i++){
      let name = obj[i].plantname
        allplants_list.push(name);
      }
    }

    let xhr1 = new XMLHttpRequest();
    xhr1.open('get', 'http://localhost:3001/myplants');
    xhr1.send();

    xhr1.onload = function() {
      var obj = JSON.parse(xhr1.response);
      for(let i=0; i<obj.length; i++){
      let name = obj[i].plantname
        myPlants_list.push(name);
      }
    }

    setTimeout(function(){
    var diff = allplants_list.filter(x => !myPlants_list.includes(x));
    const s = document.getElementById("plant");
    for(let i=0; i<diff.length; i++){
      var option = document.createElement("option");
      option.text = diff[i];
      option.value = diff[i];
      s.add(option);
    }}, 1500)


    });

  </script>
  

  
  <input id="qty" type="number" style="margin-top: 30px; margin-bottom: 30px; width: 45%; font-size: 24px;">
  </div>

  
  <script>
    function doAct(){
        $(document).ready(function() {
let xhr = new XMLHttpRequest();

var act = "http://localhost:3001/newPlant"
        var plant = document.getElementById("plant").value;
        var qty = document.getElementById("qty").value;
        if(qty.replaceAll('\n','').trim()=="" || parseInt(qty)<=0){
          console.log("Quantity Invalid!")
          return;
        }
        var url = new URL(act);
        url.searchParams.set('plant', plant);
        url.searchParams.set('qty', parseInt(qty))
        console.log(url)
        console.log(url.toString())

xhr.open('get', url.toString());
xhr.send();
window.location.href = "./MyPlants.html";
})};
  </script>

  <br>
  <input id="add" type="button" onclick="doAct()" value="Add" style="margin-bottom: 30px; font-weight: bold; width: 15%; min-width: 80px; padding-top: 2%; padding-bottom: 2%; ">

</form>

</body>
</html>