<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="client-profile.php" class="avatar">G</a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<ul class="dropdown-menu pull-right">
										<li><a href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a></li>
										<li><a href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>
									</ul>
								</div>
								<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$row["company_name"]?></a></h4>
								<h5 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$row["firstname"]." ".$row["lastname"]?></a></h5>
								<div class="small text-muted"><?=$row["designation"]?></div>
								<a href="chat.php" class="btn btn-default btn-sm m-t-10">Message</a>
								<a href="client-profile.php" class="btn btn-default btn-sm m-t-10">View Profile</a>
							</div>
</div>