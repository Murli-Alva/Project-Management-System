<?php
require ("../connect.php");
session_start();
error_reporting(0);
  $query = "SELECT * FROM employees WHERE email = '$_SESSION[email]'";
  $data = mysql_query($query);
  $result = mysql_fetch_assoc($data);
  $_SESSION['e_id'] = $result['e_id'];
  $_SESSION['email'] = $result['email'];
  
  $userprofile1 = $result['email'];
  $userprofile2 = $result['role'];

  if(($userprofile1 == true) && ($userprofile2 == 'Admin'))
  {
  
  }
  else
  {
    header('location:../login.php');
  }

  if($result['pic_source'] == NULL)
  {
  	$result['pic_source'] = '../assets/img/user.jpg';
  }
?>
<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
    <title>Profile</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/plugins/morris/morris.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <body>
        <div class="main-wrapper">
            <?php require('header.php');?>
			<?php require('sidebar.php');?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-8">
							<h4 class="page-title">My Profile</h4>
						</div>
						
						<div class="col-sm-4 text-right m-b-30">
							<a href="edit-profile.php" class="btn btn-primary rounded"><i class="fa fa-plus">
							</i> Edit Profile</a>
						</div>
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img class="avatar" src="<?php echo $result['pic_source'];?>" alt=""></a>
										</div>
									</div>
									<div class="profile-basic">
										<div class="row">
											<div class="col-md-5">
												<div class="profile-info-left">
													<h3 class="user-name m-t-0 m-b-0"><?php echo $result['firstname']." ".$result['lastname'];?></h3>
													<small class="text-muted"><?php echo $result['designation'];?></small>
													<div class="staff-id">Employee ID : <?php echo $result['e_id'];?></div>
												</div>
											</div>
											<div class="col-md-7">
												<ul class="personal-info">
													<li>
														<span class="title">Phone:</span>
														<span class="text"><?php echo $result['phone_no'];?>
														</span>
													</li>
													<li>
														<span class="title">Email:</span>
														<span class="text"><?php echo $result['email'];?></span>
													</li>
													<li>
														<span class="title">Birthdate:</span>
														<span class="text"><?php echo $result['birth_date'];?></span>
													</li>
													<li>
														<span class="title">Address:</span>
														<span class="text"><?php echo $result['address'];?></span>
													</li>
													<li>
														<span class="title">Gender:</span>
														<span class="text"><?php echo $result['gender'];?></span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="card-box m-b-0">
								<h3 class="card-title">Skills</h3>
								<div class="skills">
									<span><?php echo $result['skill1'];?></span>
									<span><?php echo $result['skill2'];?></span>
									<span><?php echo $result['skill3'];?></span>
									<span><?php echo $result['skill4'];?></span>
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<div class="card-box">
								<h3 class="card-title">Education Informations</h3>
								<div class="experience-box">
									<ul class="experience-list">
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name"><?php echo $result['institue1'];?></a>
													<div><?php echo $result['degree1'];?></div>
													<span class="time"><?php echo $result['starting_date1']." to ".$result['ending_date1'];?></span>
												</div>
											</div>
										</li>
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name"><?php echo $result['institue2'];?></a>
													<div><?php echo $result['degree2'];?></div>
													<span class="time"><?php echo $result['starting_date2']." to ".$result['ending_date2'];?></span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-box m-b-0">
								<h3 class="card-title">Experience</h3>
								<div class="experience-box">
									<ul class="experience-list">
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name"><?php echo $result['job_position1']." at ".$result['company_name1'];?></a>
													<span class="time"><?php echo $result['period_from1']." to ".$result['period_to1'];?></span>
												</div>
											</div>
										</li>
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content">
													<a href="#/" class="name"><?php echo $result['job_position2']." at ".$result['company_name2'];?></a>
													<span class="time"><?php echo $result['period_from2']." to ".$result['period_to2'];?></span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
				<?php require('notification-box.php');?>
            </div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="../assets/plugins/morris/morris.min.js"></script>
		<script type="text/javascript" src="../assets/plugins/raphael/raphael-min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
</html>