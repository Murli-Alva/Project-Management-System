<!DOCTYPE html>
<html>
<?php session_start(); ?>
<head>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Projects</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/plugins/summernote/dist/summernote.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<script src="js/jquery-1.7.1.min.js"></script>

<script type="text/javascript">   
  $(document).ready(function(){
    $("#search").keyup(function(){
        var v = $("#search").val();                
        $.ajax({
          url:'Psearch.php',
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
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="page-title">Projects</h4>
						</div>
						<div class="col-xs-8 text-right m-b-30">
							<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
							
						</div>
					</div>
					<div class="row filter-row">
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
									<label class="control-label">Project Name</label>
									<input type="text" id="search" name="pname" class="form-control floating" />
							</div>
						</div>
						<div class="col-sm-3 col-xs-6">  
							<div class="form-group form-focus">
								<label class="control-label">Employee Name</label>
								<input type="text" name="" class="form-control floating" />
							</div>
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
					<div class="row">
						<?php 
							require('../connect.php');

							$query = "SELECT * FROM projects ORDER BY p_name ASC";

							if ($result = mysql_query($query)) 
							{
    							while ($row = mysql_fetch_assoc($result)) 
    						{
						?>
						<div id="show1"></div>
						<div class="col-lg-3 col-sm-4" id="hider">
							<div class="card-box project-box" id="hider">
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
										<li><a href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="project-title"><a href="project-view.php"><?echo $row['p_name'];?></a></h4>
								<small class="block text-ellipsis m-b-15">
									<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
									<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
								</small>
								<p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
									typesetting industry. When an unknown printer took a galley of type and
									scrambled it...
								</p>
								<div class="pro-deadline m-b-15">
									<div class="sub-title">
										Deadline:
									</div>
									<div class="text-muted">
										8 Sep 2017
									</div>
								</div>
								<div class="project-members m-b-15">
									<div>Project Manager :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img src="../assets/img/user.jpg" alt="Jeffery Lalor"></a>
										</li>
									</ul>
								</div>
								<div class="project-members m-b-15">
									<div>Team Leader :</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img src="../assets/img/user.jpg" alt="Jeffery Lalor"></a>
										</li>
									</ul>
								</div>
								<div class="project-members m-b-15">
									<div>Team Member:</div>
									<ul class="team-members">
										<li>
											<a href="#" data-toggle="tooltip" title="John Doe"><img src="../assets/img/user.jpg" alt="John Doe"></a>
										</li>
										<li>
											<a href="#" data-toggle="tooltip" title="Richard Miles"><img src="../assets/img/user.jpg" alt="Richard Miles"></a>
										</li>
										<li>
											<a href="#" data-toggle="tooltip" title="John Smith"><img src="../assets/img/user.jpg" alt="John Smith"></a>
										</li>
										<li>
											<a href="#" data-toggle="tooltip" title="Mike Litorus"><img src="../assets/img/user.jpg" alt="Mike Litorus"></a>
										</li>
										<li>
											<a href="#" class="all-users">+15</a>
										</li>
									</ul>
								</div>
								<p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
								<div class="progress progress-xs m-b-0">
									<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
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
			<div id="create_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Create Project</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="add_project.php">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input class="form-control" placeholder="e.g. Project Management System" type="text" name="projectname" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select" name="c_name" required>
												<option>Self</option>
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text" name="start_date"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" style="" name="end_date" type="text"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Project manager</label>
											<select class="select" name="p_manager">
												<option>Select</option>
												<?php 
							require('../connect.php');

							$query = "SELECT * FROM employees WHERE role = 'Project Manager'";

							if ($result = mysql_query($query)) 
							{
    							while ($row = mysql_fetch_assoc($result)) 
    						{
    							$fname = $row['firstname'];
						?>
												<option value="<?php echo $fname; ?>"><?php echo $fname; ?></option>
												<?php
							}
							 mysql_free_result($result);
								}							
						?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select" name="priority">
												<option>High</option>
												<option>Medium</option>
												<option>Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" cols="5" class="form-control summernote" name="project_description" placeholder="Enter your message here"></textarea>
								</div>
							<div class="row">
								<div class="">
									<div class="col-md-6">
										<div class="form-group">
										<label>Upload File</label>
										<input class="form-control" type="file" name="ifile">
										</div>
									</div>
								</div>
								<div class="col-md-6">
								</div>
							</div>
								<div class="m-t-20 text-center">
									<button name="submit" type="submit" class="btn btn-primary">Create Project</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="edit_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Edit Project</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name</label>
											<input class="form-control" value="School Guru" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon"><input class="form-control datetimepicker" style="" type="text"></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Rate</label>
											<input placeholder="$50" class="form-control" value="$5000" type="text">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>&nbsp;</label>
											<select class="select">
												<option>Hourly</option>
												<option selected>Fixed</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select">
												<option selected>High</option>
												<option>Medium</option>
												<option>Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Add Project Leader</label>
											<input class="form-control" type="text">
										</div>
									</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
								</div>
								<div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary">Save Changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h4 class="modal-title">Delete Project</h4>
						</div>
						<div class="modal-body card-box">
							<p>Are you sure want to delete this?</p>
							<div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
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
		<script type="text/javascript" src="../assets/js/moment.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
		<script type="text/javascript" src="../assets/plugins/summernote/dist/summernote.min.js"></script>
        <script>
		$(document).ready(function(){
			$('.summernote').summernote({
				height: 200,                 // set editor height
				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor
				focus: false                 // set focus to editable area after initializing summernote
			});
		});
        </script>
    </body>
</html>