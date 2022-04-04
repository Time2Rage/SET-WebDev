<?php 
    require_once "../layout/loginHeader.php"; 
    require_once "../lib/User.php";

    $User = new User($_POST['email'], $_POST['password']);
    
    if(isset($_POST['login'])){        
       $User->login($_POST['email'], $_POST['password']);
    }
    if (isset($_POST['create'])){
        $User->create($_POST['email'], $_POST['password']);
    }
?> 




<div class='some-page-wrapper'>
  <div class='row'>
    <div class='column'>
      <div class='blue-column'>
      <h2> Login </h2>

<form method="post">
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password">

    <input type="submit" name="login" value="Submit">
</form>
<a href="index.php">Back to home</a>

<h2> Create account </h2>

<form method="post">
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password</label>
    <input type="text" name="password" id="password">

    <input type="submit" name="create" value="Submit">
</form>
<a href="index.php">Back to home</a>
      </div>
    </div>
    <div class='column'>
      <div class='green-column'>
        Some Text in Column Two
      </div>
    </div>
  </div>
</div>

<?php include "../layout/footer.php"; ?> 