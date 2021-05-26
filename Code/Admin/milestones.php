<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Milestones</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
    <body>
        <div class="main-wrapper">
            <?php require('header.php');?>
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul>
							<li> 
								<a href="index.php"><i class="fa fa-home"></i> Back to Home</a>
							</li>
							<li class="menu-title">Projects <a href="#" data-toggle="modal" data-target="#create_project"></a></li>
							<li> 
								<a href="tasks.php">School Guru</a>
							</li>
							<li class="active"> 
								<a href="tasks.php">Harvey Clinic</a>
							</li>
							<li> 
								<a href="tasks.php">Penabook</a>
							</li>
							<li> 
								<a href="tasks.php">Food and Drinks</a>
							</li>
						</ul>
					</div>
                </div>
            </div>
            <div class="page-wrapper">
				<div class="chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-xs-7 message-view task-view">
							<div class="chat-window">
								<div class="chat-header">
									<div class="navbar">
										<div class="pull-left">
											<div class="add-task-btn-wrapper">
												<div class="add-task-btn-wrapper">
													<a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_employee">Add Milestone</a>
											</div>
											</div>
										</div>
										<ul class="nav navbar-nav pull-right chat-menu">
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
												<ul class="dropdown-menu">
													<li><a href="javascript:void(0)">Pending Milestones</a></li>
													<li><a href="javascript:void(0)">Completed Milestones</a></li>
													<li><a href="javascript:void(0)">All Milestones</a></li>
												</ul>
											</li>
										</ul>
										<a class="task-chat profile-rightbar pull-right" href="#task_window"><i class="fa fa fa-comment"></i></a>
									</div>
								</div>
								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="task-wrapper">
													<div class="task-list-container">
														<div class="task-list-body">
															<ul id="task-list">
																<li class="task">
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
																		<span class="task-label" contenteditable="true">Patient appointment booking</span>
																		<span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
																			<span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																	</div>
																</li>
																<li class="completed task">
																	<div class="task-container">
																		<span class="task-action-btn task-check">
																			<span class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
																		<span class="task-label">Doctor available module</span>
																		<span class="task-action-btn task-btn-right">
																			<span class="action-circle large" title="Assign">
																				<i class="material-icons">person_add</i>
																			</span>
																			<span class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																	</div>
																</li>
															</ul>
														</div>
														<div class="task-list-footer">
															<div class="new-task-wrapper">
																<textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
																<span class="error-message hidden">You need to enter a task first</span>
																<span class="add-new-task-btn btn" id="add-task">Add Task</span>
																<span class="cancel-btn btn" id="close-task-panel">Close</span>
															</div>
														</div>
													</div>
												</div>
												<div class="notification-popup hide">
													<p>
														<span class="task"></span>
														<span class="notification-text"></span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-3 message-view task-chat-view" id="task_window">
							<div class="chat-window">
								<div class="chat-header">
									<div class="navbar">
										<div class="task-assign">
											<span class="assign-title">Assigned to </span> 
											<a href="#" data-toggle="tooltip" data-placement="bottom" title="">
												<img src="../assets/img/user.jpg" class="avatar" alt="" height="20" width="20">
											</a>
										</div>
									</div>
								</div>
								<div class="chat-contents task-chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div class="chats">
													<h4>Harvey Clinic</h4>
													<hr class="task-line" />
													
								<div class="panel">
								<div class="panel-body">
									<h6 class="panel-title m-b-15">Milestones Details</h6>
									<table class="table table-striped table-border">
										<tbody>
											<tr>
												<td>Created By:</td>
												<td class="text-right">Kalpesh Prajapati</td>
											</tr>
											<tr>
												<td>Created On:</td>
												<td class="text-right">25 Feb, 2017</td>
											</tr>
											<tr>
												<td>Start Date:</td>
												<td class="text-right">25 Feb, 2017</td>
											</tr>
											<tr>
												<td>Due Date:</td>
												<td class="text-right">25 Feb, 2017</td>
											</tr>
											<tr>
												<td>Deadline:</td>
												<td class="text-right">12 Nov, 2017</td>
											</tr>
											<tr>
												<td>Duration:</td>
												<td class="text-right">100 Hours</td>
											</tr>
											<tr>
												<td>Owner:</td>
												<td class="text-right">Harvey Clinic</td>
											</tr>
											<tr>
												<td>Priority:</td>
												<td class="text-right">
													<div class="btn-group">
														<a href="#" class="label label-danger dropdown-toggle" data-toggle="dropdown">Highest <span class="caret"></span></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a></li>
															<li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a></li>
														</ul>
													</div>
												</td>
											</tr>
											<tr>
												<td>Status:</td>
												<td class="text-right">Working</td>
											</tr>
										</tbody>
									</table>
									<p class="m-b-5">Progress <span class="text-success pull-right">40%</span></p>
									<div class="progress progress-xs m-b-0">
										<div class="progress-bar progress-bar-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
									</div>
								</div>
								</div>
							</div>
						</div>
						<div id="add_employee" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">Add Milestones</h4>
						</div>
						<div class="modal-body">
							<form class="m-b-30" method="post" action="">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Milestone Id</label>
											<input class="form-control" type="text" name="" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Created by</label>
											<select class="select" name="">
												<option>Select</option>
											<?php 
												require('../connect.php');

												$query = "SELECT * FROM employees WHERE role = 'Project Manager' ORDER BY firstname ASC";

												if ($result = mysql_query($query)) 
											{
    											while ($row = mysql_fetch_assoc($result)) 
    										{
											?>
											<option><?php echo $row['firstname']." ". $row['lastname'];?></option>
											<?php
											}
												 mysql_free_result($result);
											}							
											?>
										</select>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Created On</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text" name="" required> 
											</div>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Start Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text" name="" required> 
											</div>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Due Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text" name="" required> 
											</div>
										</div>
									</div>
									<div class="col-sm-6">  
										<div class="form-group">
											<label class="control-label">Deadline</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text" name="" required> 
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Duration</label>
											<input class="form-control" type="text" name="" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Owner</label>
											<select class="select" name="">
												<option>Select</option>
											<?php 
												require('../connect.php');

												$query = "SELECT * FROM clients ORDER BY firstname ASC";

												if ($result = mysql_query($query)) 
											{
    											while ($row = mysql_fetch_assoc($result)) 
    										{
											?>
											<option><?php echo $row['firstname']." ". $row['lastname'];?></option>
											<?php
											}
												 mysql_free_result($result);
											}							
											?>
										</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Priority</label>
											<select class="select" name="" required>
												<option value="">Select</option>
												<option value="">Highest</option>
												<option value="">High</option>
												<option value="">Medium</option>
												<option value="">Low</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Status</label>
											<select class="select" name="" required>
												<option value="">Select</option>
												<option value="">Pending</option>
												<option value="">Completed</option>
											</select>
										</div>
									</div>
									<div class="panel project-user">
							</div>
							<div class="panel-body">
									<h6 class="panel-title m-b-20">Task lists <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</a></h6>
									<ul class="list-box">
										<li>
											<a href="profile.php">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar">W</span>
													</div>
													<div class="list-body">
														<span class="message-author">Wilmer Deluna</span>
														<div class="clearfix"></div>
														<span class="message-content">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
										<li>
											<a href="profile.php">
												<div class="list-item">
													<div class="list-left">
														<span class="avatar">L</span>
													</div>
													<div class="list-body">
														<span class="message-author">Lesley Grauer</span>
														<div class="clearfix"></div>
														<span class="message-content">Team Leader</span>
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-t-20 text-center">
									<button class="btn btn-primary" type="submit" name="submit">Create Milestone</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
					</div>
				</div>
				<div id="create_project" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content modal-lg">
							<div class="modal-header">
								<h4 class="modal-title">Create Project</h4>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Project Name</label>
												<input class="form-control" type="text">
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
												<input placeholder="$50" class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>&nbsp;</label>
												<select class="select">
													<option>Hourly</option>
													<option>Fixed</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Priority</label>
												<select class="select">
													<option>High</option>
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
										<div class="col-md-6">
											<div class="form-group">
												<label>Team Leader</label>
												<div class="project-members">
													<a href="#" data-toggle="tooltip" title="Jeffery Lalor">
														<img src="assets/img/user.jpg" class="avatar" alt="Jeffery Lalor" height="20" width="20">
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Add Team</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Team Members</label>
												<div class="project-members">
													<a href="#" data-toggle="tooltip" title="John Doe">
														<img src="assets/img/user.jpg" class="avatar" alt="John Doe" height="20" width="20">
													</a>
													<a href="#" data-toggle="tooltip" title="Richard Miles">
														<img src="assets/img/user.jpg" class="avatar" alt="Richard Miles" height="20" width="20">
													</a>
													<a href="#" data-toggle="tooltip" title="John Smith">
														<img src="assets/img/user.jpg" class="avatar" alt="John Smith" height="20" width="20">
													</a>
													<a href="#" data-toggle="tooltip" title="Mike Litorus">
														<img src="assets/img/user.jpg" class="avatar" alt="Mike Litorus" height="20" width="20">
													</a>
													<span class="all-team">+2</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea rows="4" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary">Create Project</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div id="assignee" class="modal custom-modal fade center-modal" role="dialog">
					<div class="modal-dialog">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Assign to this task</h3>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search to add" class="form-control search-input input-lg" type="text">
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg">Search</button>
									</span>
								</div>
								<div>
									<ul class="media-list media-list-linked chat-user-list">
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left"><span class="avatar">R</span></div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">Richard Miles</div>
													<span class="designation">Web Developer</span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left"><span class="avatar">J</span></div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">John Smith</div>
													<span class="designation">Android Developer</span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left">
													<span class="avatar">
														<img src="assets/img/user.jpg" alt="John Doe">
													</span>
												</div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">Jeffery Lalor</div>
													<span class="designation">Team Leader</span>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-t-50 text-center">
								<button class="btn btn-primary btn-lg">Assign</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="task_followers" class="modal custom-modal fade center-modal" role="dialog">
					<div class="modal-dialog">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Add followers to this task</h3>
							</div>
							<div class="modal-body">
								<div class="input-group m-b-30">
									<input placeholder="Search to add" class="form-control search-input input-lg" id="btn-input" type="text">
									<span class="input-group-btn">
										<button class="btn btn-primary btn-lg">Search</button>
									</span>
								</div>
								<div>
									<ul class="media-list media-list-linked chat-user-list">
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left"><span class="avatar">J</span></div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">Jeffery Lalor</div>
													<span class="designation">Team Leader</span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left"><span class="avatar">C</span></div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">Catherine Manseau</div>
													<span class="designation">Android Developer</span>
												</div>
											</a>
										</li>
										<li class="media">
											<a href="#" class="media-link">
												<div class="media-left"><span class="avatar">W</span></div>
												<div class="media-body media-middle text-nowrap">
													<div class="user-name">Wilmer Deluna</div>
													<span class="designation">Team Leader</span>
												</div>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-t-50 text-center">
									<button class="btn btn-primary btn-lg">Add to Follow</button>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<div class="task-overlay" data-reff="#task_window"></div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="../assets/js/select2.min.js"></script>
		<script type="text/javascript" src="../assets/js/moment.min.js"></script>
		<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
		<script type="text/template" id="task-template">
			<li class="task">
				<div class="task-container">
					<span class="task-action-btn task-check">
						<span class="action-circle large complete-btn" title="Mark Complete">
							<i class="material-icons">check</i>
						</span>
					</span>
					<span class="task-label" contenteditable="true"></span>
					<span class="task-action-btn task-btn-right">
						<span class="action-circle large" title="Assign">
							<i class="material-icons">person_add</i>
						</span>
						<span class="action-circle large delete-btn" title="Delete Task">
							<i class="material-icons">delete</i>
						</span>
					</span>
				</div>
			</li>
		</script>
		<script type="text/javascript" src="../assets/js/task.js"></script>
    </body>
</html>