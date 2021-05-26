<?php
require ("../connect.php");
session_start();
error_reporting(0);
  $query = "SELECT * FROM employees WHERE email = '$_SESSION[email]'";
  $data = mysql_query($query);
  $result = mysql_fetch_assoc($data);
  $_SESSION['e_id'] = $result['e_id'];
  $_SESSION['role'] = $result['role'];

  $userprofile1 = $_SESSION['email'];
  $userprofile2 = $_SESSION['role'];

  if(($userprofile1 == true) && ($userprofile2 == 'Admin'))
  {
  
  }
  else
  {
    header('location:../login.php');
  }
?>
<?php
if(isset($_POST['update'])) 
	{
		require('../connect.php');

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "../assets/img/employees/".$filename;
	move_uploaded_file($tempname,$folder);

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birth_date = $_POST['birth_date'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$pincode = $_POST['pincode'];

		$institute1 = $_POST['institute1'];
		$degree1 = $_POST['degree1'];
		$starting_date1 = $_POST['starting_date1'];
		$ending_date1 = $_POST['ending_date1'];
		$institute2 = $_POST['institute2'];
		$degree2 = $_POST['degree2'];
		$starting_date2 = $_POST['starting_date2'];
		$ending_date2 = $_POST['ending_date2'];

		$skill1 = $_POST['skill1'];
		$skill2 = $_POST['skill2'];
		$skill3 = $_POST['skill3'];
		$skill4 = $_POST['skill4'];

		$company_name1 = $_POST['company_name1'];
		$job_position1 = $_POST['job_position1'];
		$period_from1 = $_POST['period_from1'];
		$period_to1 = $_POST['period_to1'];
		$company_name2 = $_POST['company_name2'];
		$job_position2 = $_POST['job_position2'];
		$period_from2 = $_POST['period_from2'];
		$period_to2 = $_POST['period_to2'];
	
		$sql1 = "UPDATE employees SET firstname='$firstname',lastname='$lastname',birth_date='$birth_date',gender='$gender',address='$address',state='$state',country='$country',pincode='$pincode',institute1='$institute1',degree1='$degree1',starting_date1='$starting_date1',ending_date1='$ending_date1',institute2='$institute2',degree2='$degree2',starting_date2='$starting_date2',ending_date2='$ending_date2',skill1='$skill1',skill2='$skill2',skill3='$skill3',skill4='$skill4',company_name1='$company_name1',job_position1='$job_position1',period_from1='$period_from1',period_to1='$period_to1',company_name2='$company_name2',job_position2='$job_position2',period_from2='$period_from2',period_to2='$period_to2',pic_source='$folder'
		 		WHERE e_id = '$_SESSION[e_id]'";		
			
			mysql_query($sql1);	
			header("Location:profile.php?update-success");
			exit();	
	}	
?>
<?php
	
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Edit Profile</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
    <body>
        <div class="main-wrapper">
            <?php require('header.php');?>
			<?php require('sidebar.php');?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">Edit Profile</h4>
						</div>
					</div>

					<form method="POST">
						<div class="card-box">
							<h3 class="card-title">Basic Information</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="profile-img-wrap">
										<img class="inline-block" src="<?php echo $result['pic_source'];?>" alt="user">
										<div class="fileupload btn btn-default">
											<span class="btn-text">edit</span>
											<input class="upload" type="file" name="uploadfile" value=""/>
										</div>
									</div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">First Name</label>
													<input type="text" class="form-control floating" name="firstname"/>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Last Name</label>
													<input type="text" class="form-control floating" name="lastname"/>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus">
													<label class="control-label">Birth Date</label>
													<div class="cal-icon"><input class="form-control floating datetimepicker" type="text" name="birth_date"></div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-focus select-focus">
													<label class="control-label">Gender</label>
													<select class="select form-control floating" name="gender">
														<option value="">Select Gender</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Contact Information</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group form-focus">
										<label class="control-label">Address</label>
										<input type="text" class="form-control floating" name="address"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">State</label>
										<input type="text" class="form-control floating" name="state"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Country</label>
										<input type="text" class="form-control floating" name="country"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Pin Code</label>
										<input type="text" class="form-control floating" name="pincode"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Phone Number</label>
										<input type="text" class="form-control floating" name="phone_no"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Education Information (UG)</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Institution</label>
										<input type="text" class="form-control floating" name="institute1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Degree</label>
										<input type="text" class="form-control floating" name="degree1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Starting Date</label>
										<input type="text" class="form-control floating" name="starting_date1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Complete Date</label>
										<input type="text" class="form-control floating" name="ending_date1"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Education Information (PG)</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Institution</label>
										<input type="text" class="form-control floating" name="institute2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Degree</label>
										<input type="text" class="form-control floating" name="degree2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Starting Date</label>
										<input type="text" class="form-control floating" name="starting_date2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Complete Date</label>
										<input type="text" class="form-control floating" name="ending_date2"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Skills</h3>
							<div class="row">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Skills</label>
										<input type="text" class="form-control floating" name="skill1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Skills</label>
										<input type="text" class="form-control floating" name="skill2"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Skills</label>
										<input type="text" class="form-control floating" name="skill3"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Skills</label>
										<input type="text" class="form-control floating" name="skill4"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Experience Information (1)</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Company Name</label>
										<input type="text" class="form-control floating" name="company_name1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Job Position</label>
										<input type="text" class="form-control floating" name="job_position1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Period From</label>
										<input type="text" class="form-control floating" name="period_from1"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Period To</label>
										<input type="text" class="form-control floating" name="period_to1"/>
									</div>
								</div>
							</div>
						</div>
						<div class="card-box">
							<h3 class="card-title">Experience Information (2)</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Company Name</label>
										<input type="text" class="form-control floating" name="company_name2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Job Position</label>
										<input type="text" class="form-control floating" name="job_position2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Period From</label>
										<input type="text" class="form-control floating" name="period_from2"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-focus">
										<label class="control-label">Period To</label>
										<input type="text" class="form-control floating" name="period_to2"/>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center m-t-20">
							<button class="btn btn-primary btn-lg" name="update" type="submit">Save &amp; update</button>
						</div>
					</form>
					
				</div>
				<?php require('includes/notification-box.php');?>
			</div>
		</div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="../assets/js/select2.min.js"></script>
		<script type="text/javascript" src="../assets/js/moment.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
</html>