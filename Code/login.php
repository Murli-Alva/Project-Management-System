<?php
session_start();
require ("connect.php");

    if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['password'];
		$query = "SELECT * FROM employees WHERE email='$email' && password_1='$pwd'";
		$data = mysql_query($query);
		$total = mysql_num_rows($data);
	
		if($total==1)
		{
			$query = "SELECT * FROM employees WHERE email='$email'";
			$data = mysql_query($query);
			$result = mysql_fetch_assoc($data);
			$_SESSION['firstname'] = $result['firstname'];
			$_SESSION['lastname'] = $result['lastname'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['role'] = $result['role'];
			if($_SESSION['role'] == 'Admin')
			{
				header('location:Admin/index.php');
			}
			else if($_SESSION['role'] == 'Project Manager')
			{
				header('location:Project Manager/index.php');
			}
			else if($_SESSION['role'] == 'Team Leader')
			{
				header('location:Team Leader/index.php');
			}
			else	
			{
				header('location:Team Member/index.php');
			}
		}
		else
		{
			echo "login failed";
		}
	}
?>
<!DOCTYPE html>
<html>   
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo5.png">
        <title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
    <body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">Management Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.php"><img src="assets/img/logo5.png" alt="Project Cafe Technologies"></a>
							</div>
							<form method="POST">
								<div class="form-group form-focus">
									<label class="control-label">Email</label>
									<input class="form-control floating" type="text" name="email">
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input class="form-control floating" type="password" name="password">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit" name="login" value="login">Login</button>
								</div>
								<div class="text-center">
									<a href="forgot-password.php">Forgot your password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
    </body>

</html>