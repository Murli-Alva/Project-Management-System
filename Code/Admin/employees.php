<?php
require ("../connect.php");
session_start();
error_reporting(0);
  $query = "SELECT * FROM employees WHERE email = '$_SESSION[email]'";
  $data = mysql_query($query);
  $result = mysql_fetch_assoc($data);
  $_SESSION['e_id'] = $result['e_id'];
  $_SESSION['email'] = $result['email'];
  
  $userprofile = $_SESSION['email'];
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
  	$result['pic_source'] == '../assets/img/user.jpg';
  }
?>
<?php
if(isset($_POST['submit'])) 
	{
		require('../connect.php');
		require('../password_generator.php');

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];		
		$join_date = $_POST['join_date'];
		$phone_no = $_POST['phone_no'];
		$role = $_POST['role'];
		$designation = $_POST['designation'];
		$department = $_POST['department'];

		$sql = "INSERT INTO employees (firstname, lastname, email, password_1, join_date, phone_no, role, 									designation, department) 
				VALUES ('$firstname','$lastname','$email','$agpass','$join_date','$phone_no','$role',
						'$designation','$department');";
		
			mysql_query($sql);	
			header("Location:employees.php?register-success");
			exit();	
	}
?>
<?php
if(isset($_POST['update'])) 
	{
		require('../connect.php');

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];	
		$join_date = $_POST['join_date'];
		$phone_no = $_POST['phone_no'];
		$role = $_POST['role'];
		$designation = $_POST['designation'];
		$department = $_POST['department'];
		$em_id = $_POST['em_id'];

		$sql1 = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', join_date = '$join_date', phone_no = '$phone_no', role = '$role', designation = '$designation', department ='$department' 			WHERE e_id = '$em_id' ";		
			
			mysql_query($sql1);	
			header("Location:employees.php?update-success");
			exit();	
	}	
?>
<?php
if(isset($_POST['delete'])) 
	{
		require('../connect.php');

		$em_id = $_POST['em_id'];
		$sql2 = "DELETE FROM employees
		 			WHERE e_id = '$em_id' ";		
			
			mysql_query($sql2);	
			header("Location:employees.php?delete-success");
			exit();	
	}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Employees</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<script src="assets/js/jquery-1.7.1.min.js"></script>

<script type="text/javascript">   
  $(document).ready(function(){
    $("#search").keyup(function(){
        var v = $("#search").val();                
        $.ajax({
          url:'Esearch.php',
          type:'post',
          data: $("#frm").serialize(),
          success:function(Msg){
            $("#show1").html(Msg);
            $("#hider").hide();
          }
        });
    });
  });
  </script>
    <body>
        <div class="main-wrapper">
            <?php require('header.php');?>
            <?php require('sidebar.php');?>
            <?php require('../password_generator.php');?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Employee</h4>
						</div>
						<div class="col-xs-8 text-right m-b-20">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
						</div>
					</div>
					<div class="row filter-row">
                           <div class="col-sm-3 col-xs-6">  
								<div class="form-group form-focus">
									<label class="control-label">Employee ID</label>
									<input type="text" class="form-control floating" />
								</div>
                           </div>
                           
                           <div class="col-sm-3 col-xs-6">
                           	<form method="POST" action="" id="frm">					            	      
								<div class="form-group form-focus">
									<label class="control-label">Employee Name</label>
									<input type="text" class="form-control floating" name="ename" id="search" />
								</div>
							</form>	
                           </div>
                           <div class="col-sm-3 col-xs-6"> 
								<div class="form-group form-focus select-focus">
									<label class="control-label">Designation</label>
									<select class="select floating"> 
										<option value="All">All</option>
										<option value="Web Developer">Web Developer</option>
										<option value="Software Engineer">Software Engineer</option>
										<option value="Software Tester">Software Tester</option>
										<option value="Web Designer">Web Designer</option>
										<option value="UI/UX Developer">UI/UX Developer</option>
										<option value="Android Developer">Android Developer</option>
										<option value="IOS Developer">IOS Developer</option>
										<option value="IT Technician">IT Technician</option>
										<option value="Product Manager">Product Manager</option>
										<option value="SEO Analyst">SEO Analyst</option>
										<option value="System Engineer">System Engineer</option>
										<option value="System Administrator">System Administrator</option>
									</select>
								</div>
                           </div>
                           <div class="col-sm-3 col-xs-6">  
                                <a href="#" class="btn btn-success btn-block"> Search </a>  
                           </div>     
                    </div>
                    <div id="show1"></div>
					<div class="row staff-grid-row" id="hider" >
						<?php 
							require('../connect.php');

							$query = "SELECT * FROM employees ORDER BY firstname ASC";

							if ($result = mysql_query($query)) 
							{
    							while ($row = mysql_fetch_assoc($result))     								
    						{
    							$em_id = $row['e_id'];
						?>
						<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="profile.php"><img class="avatar" src="<?=$row["pic_source"];?>" alt=""></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="<?php echo $em_id ?>" data-toggle="modal" data-target="#edit_employee<?php echo $em_id ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
										<li><a href="<?php echo $em_id ?>" data-toggle="modal" data-target="#delete_employee<?php echo $em_id ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="profile.php"><?= $row["firstname"]." ".$row["lastname"]?></a></h4>
								<div class="small text-muted"><?=$row["designation"]?></div>
							</div>
						</div>
						<!-- edit employee model -->
			<div id="edit_employee<?php echo $em_id ?>" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Employee </h4>
						</div>
						<div class="modal-body">
							<form class="m-b-30" method="POST">
								<div class="row">
									
										<div class="form-group">
											<input class="form-control" name="em_id" value="<?php echo $em_id ?>" type="hidden" readonly="">
										</div>
									
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" name="firstname" value="<?php echo $row["firstname"] ?>" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input class="form-control" name="lastname" value="<?php echo $row["lastname"] ?>" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" name="email" value="<?php echo $row["email"] ?>" type="email" readonly="" disable>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon"><input class="form-control datetimepicker"
											name="join_date" value="<?php echo $row["join_date"] ?>" type="text"></div>
										</div>
									</div>									
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone </label>
											<input class="form-control" name="phone_no" value="<?php echo $row["phone_no"] ?>" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Role</label>
											<select class="select" name="role">
												<option value="<?php echo $row["role"] ?>"><?php echo $row["role"];?></option>
												<option value="Project Manager">Project Manager</option>
												<option value="Team Leader">Team Leader</option>
												<option value="Team Member">Team Member</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<select class="select" name="designation">
											<option value="<?php echo $row["designation"] ?>"><?php echo $row["designation"];?></option>	    
											<option value="Web Developer">Web Developer</option>
											<option value="Software Engineer">Software Engineer</option>
											<option value="Software Tester">Software Tester</option>
											<option value="Web Designer">Web Designer</option>
											<option value="UI/UX Developer">UI/UX Developer</option>
											<option value="Android Developer">Android Developer</option>
											<option value="IOS Developer">IOS Developer</option>
											<option value="IT Technician">IT Technician</option>
											<option value="Product Manager">Product Manager</option>
											<option value="SEO Analyst">SEO Analyst</option>
											<option value="System Engineer">System Engineer</option>
											<option value="System Administrator">System Administrator</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Department</label>
											<select class="select" name="department">
												<option value="<?php echo $row["department"] ?>"><?php echo $row["department"];?></option>
												<option value="Analysis">Analysis</option>
												<option value="Design">Design</option>
												<option value="Development">Development</option>
												<option value="Testting">Testing</option>
												<option value="Maintenance">Maintenance</option>
											</select>
										</div>
									</div>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" name="update">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- end edit emp model -->
			<div id="delete_employee<?php echo $em_id ?>" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Employee </h4>
						</div>
						<form method="POST">
							<div class="modal-body card-box">
								<p>Are you sure want to delete <?php echo $row['firstname']." ".$row['lastname']; ?>?</p>
								<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
									<button type="submit" name="delete" class="btn btn-danger">Delete</button>
								</div>
							</div>
										<div class="form-group">
											<input class="form-control" name="em_id" value="<?php echo $em_id ?>" type="hidden" readonly="">
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
			<div id="add_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Employee</h4>
						</div>
						<div class="modal-body">
							<form class="m-b-30" method="POST" action="">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">First Name <span class="text-danger">*</span></label>
											<input class="form-control" placeholder="e.g. Adam" type="text" name="firstname" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Last Name</label>
											<input class="form-control" placeholder="e.g. Samules" type="text" name="lastname" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Email <span class="text-danger">*</span></label>
											<input class="form-control" placeholder="e.g. adam@xyz.com" type="email" name="email" required>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Joining Date <span class="text-danger">*</span></label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" placeholder="e.g. 01/01/2000" type="text" name="join_date" required> 
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Password</label>
											<input class="form-control" readonly="" type="" 
											name="password_1" value="<?php echo "".$agpass;?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Confirm Password</label>
											<input class="form-control" readonly="" type="" 
											name="password_2" value="<?php echo "".$agpass;?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Phone <span class="text-danger">*</span>
											</label>
											<input class="form-control" placeholder="e.g. 7567089093" type="tel" name="phone_no"
											 pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Role <span class="text-danger">*</span>
											</label>
											<select class="select" name="role" required>
												<option value="">Select</option>
												<option value="Project Manager">Project Manager</option>
												<option value="Team Leader">Team Leader</option>
												<option value="Team Member">Team Member</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Designation <span class="text-danger">*</span>
											</label>
											<select class="select" name="designation" required>
												<option value="">Select</option>
												<option value="Web Developer">Web Developer</option>
												<option value="Web Designer">Web Designer</option>
												<option value="Software Engineer">Software Engineer</option>
												<option value="Software Tester">Software Tester</option>
												<option value="UI/UX Developer">UI/UX Developer</option>
												<option value="Android Developer">Android Developer</option>
												<option value="IOS Developer">IOS Developer</option>
												<option value="IT Technician">IT Technician</option>
												<option value="Product Manager">Product Manager</option>
												<option value="SEO Analyst">SEO Analyst</option>
												<option value="System Engineer">System Engineer</option>
												<option value="System Administrator">System Administrator</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Department</label>
											<select class="select" name="department" required>
												<option value="">Select</option>
												<option value="Analysis">Analysis</option>
												<option value="Design">Design</option>
												<option value="Development">Development</option>
												<option value="Testting">Testing</option>
												<option value="Maintenance">Maintenance</option>
											</select>
										</div>
									</div>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" type="submit" name="submit">Create Employee</button>
								</div>
							</form>
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
		<script type="text/javascript" src="../assets/js/moment.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
</html>