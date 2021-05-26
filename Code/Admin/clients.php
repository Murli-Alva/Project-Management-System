<?php 
	session_start();

	/*if(!isset($_SESSION['user_id']))
	{
		header('location:../login.php');
	}*/
?>
<?php
if(isset($_POST['delete'])) 
	{
		require('../connect.php');

		$c_id = $_POST['client_id'];
		$sql1 = "DELETE FROM clients
		 			WHERE client_id = '$c_id' ";		
			
			mysql_query($sql1);	
			header("Location:clients.php?delete-success");
			exit();	
	}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Clients</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
    <body>
        <div class="main-wrapper">
      		<?php require('header.php');?>
            <?php require('sidebar.php');?>
           	<?php require('../password_generator.php'); ?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-sm-4 col-xs-3">
							<h4 class="page-title">Clients</h4>
						</div>
					</div>
					<div class="row filter-row">
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Client ID</label>
								<input type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Client Name</label>
								<input type="text" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6"> 
							<div class="form-group form-focus select-focus">
								<label class="control-label">Company</label>
								<select class="select floating"> 
									<option value="">Select Company</option>
									<option value="">Global Technologies</option>
									<option value="1">Delta Infotech</option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
					<div class="row staff-grid-row">
						<?php 
							require('../connect.php');

							$query = "SELECT * FROM clients ORDER BY firstname ASC";

							if ($result = mysql_query($query)) 
							{
								/* fetch associative array */
    							while ($row = mysql_fetch_assoc($result))	
	    					{
	    						$clt_id = $row['client_id']; 
								?>
						<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="client-profile.php" class="avatar"></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="<?php echo $clt_id?>" data-toggle="modal" data-target="#delete_client<?php echo $clt_id?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$row["company_name"]?></a></h4>
								<h5 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$row["firstname"]." ".$row["lastname"]?></a></h5>
								<div class="small text-muted"><?=$row["designation"]?></div>
								<!-- <a href="chat.php" class="btn btn-default btn-sm m-t-10">Message</a> -->
								<a href="client-profile.php" class="btn btn-default btn-sm m-t-10">View Profile</a>
							</div>
						</div>
			<div id="delete_client<?php echo $clt_id?>" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Client</h4>
						</div>
						<form method="POST">
						<div class="modal-body card-box">
							<p>Are you sure want to delete this?Are you sure want to delete <?php echo $row['company_name']?>?</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" name="delete"class="btn btn-danger">Delete</button>
							</div>
						</div>
										<div class="form-group">
											<input class="form-control" name="client_id" value="<?php echo $clt_id ?>" type="hidden" readonly="">
										</div>
						</form>
					</div>
				</div>
			</div>
						<?php
							}
							 mysql_free_result($result);
							}								
						?>
					</div>
                </div>
				<?php require('notification-box.php');?>
            </div>
			<div id="add_client" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Client</h4>
						</div>
						<div class="modal-body">
							<div class="m-b-30">
								<form method="post" action="includes/add_client.php">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="firstname" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Last Name</label>
												<input class="form-control" type="text" name="lastname" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Username <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="username" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Email <span class="text-danger">*</span></label>
												<input class="form-control" type="email" name="email" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Password</label>
												<input class="form-control" readonly="" type="" 
														name="password_1" value="<?php echo "".$agpass;?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Confirm Password</label>
												<input class="form-control" readonly="" type="" 
														name="password_2" value="<?php echo "".$agpass;?>">
											</div>
										</div>
										<div class="col-md-6">  
											<div class="form-group">
												<label class="control-label">Client ID <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="client_id"				readonly="" value="<?php echo "".$cid;?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Phone <span class="text-danger">*</span></label>
												<input class="form-control" type="tel" name="phone_no"
											 			pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Company Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="company_name" required>
											</div>
										</div>
										<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Designation <span class="text-danger">*</span>
											</label>
											<select class="select" name="designation" required>
												<option value="">Select</option>
												<option value="CEO">CEO</option>
												<option value="Manager">Manager</option>
											</select>
										</div>
									</div>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary" type="submit" name="submit">Create Client</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="../assets/js/select2.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
</html>