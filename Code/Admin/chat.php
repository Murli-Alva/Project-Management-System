<?php 
session_start();
require('../connect.php');
?>
<!DOCTYPE html>
<html>  

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo5.png">
        <title>Chat - HRMS admin template</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">		        
        <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->

        <script src="jquery-1.7.1.min.js" ></script>
        <script type="text/javascript"> 
        	$(document).ready(function(){        		

			   	setInterval(function(){
			   		var to_user_id = $("#toId").val();
			   		var from_user_Id = $("#fromId").val();
					getChat(to_user_id,from_user_Id);

					function getChat(to_user_id,from_user_Id)
					{
					   $.ajax({
					   url:"Chatget.php",
					   method:"POST",
					   data:{to_user_id:to_user_id,from_user_Id:from_user_Id},
					   success:function(data){
					    //alert(data);
					    $('#user_details').html(data);
					   }
					  })
					}

				 },1000);

		    $("#kpkp").click(function(){	

		        var to_user_id = $("#toId").val();
			   	var from_user_Id = $("#fromId").val(); 
			   	var chat_message = $("#msg").val();			   	

			   	insert_msg();

				function insert_msg()
				 {
				  $.ajax({
				   url:"Chatinsertmsg.php",
				   method:"POST",
				   data:{to_user_id:to_user_id,from_user_Id:from_user_Id,chat_message:chat_message},
				   success:function(data){
				    //alert(data);
				    $('#user').html(data);
				   }
				  })
				 }

				})

		    });		 
        </script>
        <style type="text/css">
		     @keyframes blink {50% { color: transparent }}
			.loader__dot { animation: 1s blink infinite }
			.loader__dot:nth-child(2) { animation-delay: 250ms }
			.loader__dot:nth-child(3) { animation-delay: 500ms }
        </style>

    </head>    
        <?php     
    		$id = '';$name = '';$name1 = '';$email = '';$joindate = '';$phoneno = '';$role = '';$department = '';$designation = '';
    		
    		if(isset($_POST['submit']))
    		{
    			$id = $_POST['id'];
    			echo $id;

    			$q1 = mysql_query('SELECT * FROM employees WHERE e_id = "'.$id.'"');
				while($r2 = mysql_fetch_array($q1))
				{
					$name = $r2['firstname'];
					$name1 =$r2['lastname'];
					$email = $r2['email'];
					$joindate = $r2['join_date'];
					$phoneno = $r2['phone_no'];
					$role = $r2['role'];
					$designation = $r2['designation'];
					$department = $r2['department'];
				}
    		}       					
    ?>
    <body>    	
        <div class="main-wrapper" style="margin-top: -15px">
        	<?php require('header.php');?>            
            <div class="sidebar" id="sidebar">            	
                <div class="sidebar-inner slimscroll">
					<div class="sidebar-menu">
						<ul><li> 
								<a href="index.html"><i class="fa fa-home"></i> Back to Home</a>
							</li>							
							<div class="message-search pull-right" style="padding:5px">
								<div class="input-group input-group-sm">
									<input type="text" class="form-control" placeholder="Search" required="">
									<span class="input-group-btn">
										<button class="btn" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</div>
							<li class="menu-title">Chats<a href="#" data-toggle="modal" data-target="#add_chat_user"></a></li>								
							 <?php
								$eid = $_SESSION['e_id'];
								$q = mysql_query('SELECT * FROM employees WHERE e_id != "'.$eid.'"');
								while($r1 = mysql_fetch_array($q))
								{
								?>
								<li>														
								    <form  action="" method="POST"><a href="" id="kp"><span class="status offline"></span><?php echo $r1['firstname']." ".$r1['lastname'] ?><span class="badge bg-danger pull-right"></span><input type="hidden" name="id" value="<?php echo $r1['e_id'] ?>">&nbsp;<button type="submit" name="submit" class="btn btn-info btn-xs start_chat">Start</button></a></form>
								</li>								
								<?php
								}
							?>	
							<li> 																							
								<a href="" id="kp" ><span class="status online"></span> John Doe <span class="badge bg-danger pull-right">1</span></a>							
							</li>
							<li> 
								<a href="" id="kp"><span class="status offline"></span> Richard Miles <span class="badge bg-danger pull-right">1</span></a>
							</li>
							<li> 
								<a href=""><span class="status away"></span> John Smith</a>
							</li>
							<li> 
								<a href=""><span class="status online"></span> Mike Litorus <span class="badge bg-danger pull-right">108</span></a>
							</li>																				
						</ul>
					</div>
                </div>
            </div>
            <div class="page-wrapper">
				<div class="chat-main-row">
					<div class="chat-main-wrapper">
						<div class="col-xs-9 message-view task-view">
							<?php 
								if($id!='')
								{
							?>
							<div class="chat-window">
								<div class="chat-header">
									<div class="navbar">
										<div class="user-details">
											<div class="pull-left user-img m-r-10">
												<a href="profile.html" title="Mike Litorus"><img src="../assets/img/user.jpg" alt="" class="w-40 img-circle"><span class="status online"></span></a>
											</div>
											<div class="user-info pull-left">
												<a href="profile.html" title="Mike Litorus"><span class="font-bold"><?php echo $name;?>&nbsp;<?php echo $name1;?></span> <i class="typing-text">Typing...</i></a>
												<span class="last-seen">Last seen today at 7:50 AM</span>
											</div>
										</div>										
									</div>
								</div>
								<div class="chat-contents">
									<div class="chat-content-wrap">
										<div class="chat-wrap-inner">
											<div class="chat-box">
												<div id="user_details"></div>
												<!-- <div class="chats">
													<div class="chat chat-right">
														<div class="chat-body">
															<div class="chat-bubble">
																<div class="chat-content">
																	<p>Hello. What can I do for you?</p>
																	<span class="chat-time">8:30 am</span>
																</div>
																<div class="chat-action-btns">
																	<ul>														
																		<li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="chat chat-left">													<div class="chat-body">													
															<div class="chat-bubble">
																<div class="chat-content">
																	<p>Are you there? That time!</p>
																	<span class="chat-time">8:40 am</span>
																</div>
																<div class="chat-action-btns">
																	<ul>													
																		<li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>														
												</div> -->
											</div>
										</div>
									</div>
								</div>
								<div class="chat-footer">
									<div class="message-bar">
										<div class="message-inner">
											<a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img src="../assets/img/attachment.png" alt=""></a>
											<div class="message-area"><div class="input-group">
												<textarea class="form-control" placeholder="Type message..." id="msg"></textarea>
												<span class="input-group-btn">													 
													 	<input type="hidden" id="toId" value="<?php echo $id ?>"  >
													 	<input type="hidden" id="fromId" value="<?php echo $eid ?>" >				 	
													<button class="btn btn-custom" id="kpkp" name="submit" type="submit"><i class="fa fa-send"></i></button>																	   
												</span>												
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
								}
								else 
								{
							?>
								<div style="margin-left: 220px;" ><center>
								<img src="conversation.png" style="margin-top: 120px" height="250px" width="250px">
								<div style="margin-top: 20px;font-size: 30px;" class="loader">start chat <span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></div>
								</center></div>
							<?php
								}
							?>
						</div>
						<div class="col-xs-3 profile-right fixed-sidebar-right chat-profile-view" id="task_window">
							<?php 
								if($id!='')
								{
							?>								
							<div class="display-table profile-right-inner">
								<div class="table-row">
									<div class="table-body">
										<div class="table-content">
											<div class="chat-profile-img">
												<div class="edit-profile-img">
													<img class="avatar" src="../assets/img/user.jpg" alt="">
													<span class="change-img">Change Image</span>
												</div>
												<h3 class="user-name m-t-10 m-b-0"><?php echo $name;?>&nbsp;<?php echo $name1;?></h3>
												<small class="text-muted"><?php echo $designation; ?></small>									
											</div>											
											<div class="chat-profile-info">
												<ul class="user-det-list">													
													<li>
														<span>Username:</span>
														<span class="pull-right text-muted"><?php echo $name;?>&nbsp;<?php echo $name1;?> </span>
													</li>
													<li>
														<span>Join Date:</span>
														<span class="pull-right text-muted"><?php echo $joindate; ?></span>
													</li>
													<li>
														<span>Email:</span>
														<span class="pull-right text-muted"><?php echo $email; ?></span>
													</li>
													<li>
														<span>Phone:</span>
														<span class="pull-right text-muted"><?php echo $phoneno; ?></span>
													</li>
													<li>
														<span>Role:</span>
														<span class="pull-right text-muted"><?php echo $role; ?></span>
													</li>
													<li>
														<span>Department:</span>
														<span class="pull-right text-muted"><?php echo $department; ?></span>
													</li>
													<li>
														<span>designation:</span>
														<span class="pull-right text-muted"><?php echo $designation; ?></span>
													</li>
												</ul>
											</div>											
										</div>
									</div>
								</div>
							</div>
							<?php 
								}
							?>
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
		<script type="text/javascript" src="../assets/js/dropfiles.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
    </body>
	<!-- <script>
			
			$(document).ready(function()
			{
				alert("header");		
				fetch_user();

				 function fetch_user()
				 {
				  $.ajax({
				   url:"fetch_user.php",
				   method:"POST",
				   success:function(data){
				    $('#user_details').html(data);
				   }
				  })
				 }		

			$("#kp").click(function() {
				//var kp1 = document.getElementById('kp12').value 
			   	//alert("hello.."+<?php echo $eid ?>);	
			   	//var kp1 = document.getElementById('toId').value;
			   	//var kp2 = document.getElementById('fromId').value;

			   		alert("toId"+kp1+"fromId"+kp2);
			   	fetch_user();

				 function fetch_user()
				 {
				  $.ajax({
				   url:"fetch_user.php",
				   method:"POST",
				   data:{to_user_id:to_user_id, chat_message:chat_message},
				   success:function(data){
				    $('#user_details').html(data);
				   }
				  })
				 }
				})
			});				
	</script> -->

</html>