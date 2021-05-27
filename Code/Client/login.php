<?php
session_start();
require ("../connect.php");

    if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $query = "SELECT * FROM clients WHERE email='$email' && password_1='$pwd'";
    $data = mysql_query($query);
    $total = mysql_num_rows($data);
  
    if($total==1)
    {
      $query = "SELECT * FROM clients WHERE email='$email'";
      $data = mysql_query($query);
      $result = mysql_fetch_assoc($data);
      $_SESSION['firstname'] = $result['firstname'];
      $_SESSION['lastname'] = $result['lastname'];
      $_SESSION['email'] = $result['email'];
      header('location:dashboard.php');
    }
    else
    {
      echo "login failed";
    }
  }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style1.css">

<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/user-pic1.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="forgot-password.php">Forgot Password?</a>
    </div>

  </div>
</div>