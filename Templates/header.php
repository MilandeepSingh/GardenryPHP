<?php 
  session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand ms-3" href="#">
      <img style="width: 70px;" src="logo/logo.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php $fn =  basename($_SERVER['SCRIPT_FILENAME'], '.php');  ?>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li></li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php"> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php  echo ($fn=="MyPlants")?"active":"" ?>">
          <a class="nav-link" href="MyPlants.php">My Plants</a>
        </li>
        <li class="nav-item <?php  echo ($fn=="AllPlants")?"active":"" ?>">
          <a class="nav-link" href="AllPlants.php">All Plants</a>
        </li>
        <li class="nav-item <?php  echo ($fn=="NewPlant")?"active":"" ?>">
          <a class="nav-link" href="NewPlant.php">New Plant</a>
        </li>
        <li class="nav-item <?php  echo ($fn=="notes")?"active":"" ?>">
          <a class="nav-link" href="notes.php">My Notes</a>
        </li>
        <li class="nav-item <?php  echo ($fn=="newNote")?"active":"" ?>">
          <a class="nav-link" href="newNote.php">New Note</a>
        </li>
      </ul>
      
      <ul class="navbar-nav justify-content-end">
        <?php
        session_start();
        if (!isset($_SESSION['email'])){
          echo '<li class="nav-item '.(($fn=="login")?"active":"").'">
          <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item '.(($fn=="register")?"active":"").'">
          <a class="nav-link" href="register.php">Register</a>
          </li>';
        }
        else{
          echo '<li class="nav-item">
          <a class="nav-link">'.$_SESSION['email'].'</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
          </li>
          ';
        }
        
        ?>
      </ul>
    </div>
  </nav>
