<?php 
    session_start(); 

    if($_SESSION['Active'] == false){
        header("location:login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta encoding="UTF-8">
        <meta title="CGP"> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="../css/main.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Cards Going Postal</a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="../public/Editor.php"></span> Create image</a></li>
            <li><a href="../public/Card.php"></span> View Gallery</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="../public/profile.php">Profile
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Insert details</a></li>
                  <li><a href="#">Update details</a></li>
                </ul>
            </li>
            <li><a href="#"></span> Cart</a></li>
            <form class="navbar-form navbar-left" action="../src/session.php">
              <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
          </ul>
        </div>
      </nav>
    </head>
  <body>

