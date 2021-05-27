<?php
if(isset($_POST['submit'])) 
  {
    require('../connect.php');
    require('../password_generator.php');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $company_name = $_POST['company_name'];
    $designation = $_POST['designation'];

    $sql = "INSERT INTO clients (firstname, lastname, email, password_1, phone_no, company_name, designation) 
        VALUES ('$firstname','$lastname','$email','$agpass','$phone_no','$company_name','$designation');";
    
      mysql_query($sql);  
      header("Location:login.php?register-success");
      exit(); 
  }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style1.css">

<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <img src="img/user-pic1.jpg" id="icon" alt="User Icon" />
    </div>

    <form method="POST">
      <input type="text" id="firstname" class="fadeIn second" name="firstname" placeholder="Firstname">
      <input type="text" id="lastname" class="fadeIn third" name="lastname" placeholder="Lastname">
      <input type="text" id="email" class="fadeIn third" name="email" placeholder="Email">
      <input type="text" id="phone_no" class="fadeIn third" name="phone_no" placeholder="Phone">
      <input type="text" id="company_name" class="fadeIn third" name="company_name" placeholder="Company Name">
      <input type="text" id="designation" class="fadeIn third" name="designation" placeholder="Designation">
      <input type="submit" class="fadeIn fourth" value="Register" name="submit">
    </form>

  </div>
</div>