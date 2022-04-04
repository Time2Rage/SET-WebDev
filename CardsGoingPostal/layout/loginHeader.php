<?php 
    session_start(); 

   
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
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Create image</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> View Gallery</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Cart</a></li>

            <form class="navbar-form navbar-left" action="../src/session.php">
              <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
          </ul>
        </div>
      </nav>
    </head>
  <body>

