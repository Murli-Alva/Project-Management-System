<?php

	require ('../connect.php');

	if(isset($_POST))
	{
		$cname = $_POST['cname'];
	                     
		$q1 = mysql_query('SELECT COUNT(*) FROM clients WHERE firstname LIKE "'.$cname.'%"');

		while($r1 = mysql_fetch_array($q1))
		{
			$c = $r1['0'];
		}
		if($c==0)
		{
			echo "<div class='well bg-warning'><h4 class='text-white'>No Result Found For ".$cname."..</h4></div>";
		}
		else
		{
	
		?>	

		<div class="row staff-grid-row">
				<?php
							$q2 = mysql_query('SELECT * FROM clients WHERE firstname LIKE "'.$cname.'%"');

							while($r2 = mysql_fetch_array($q2))
							{
									$cname = $r2["company_name"];
									$fname = $r2["firstname"];
									$lname = $r2["lastname"];
									$des = $r2["designation"];	
					?>

					<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="client-profile.php" class="avatar">G</a>
								</div>
								<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$r2["company_name"]?></a></h4>
								<h5 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php"><?=$r2["firstname"]." ".$r2["lastname"]?></a></h5>
								<div class="small text-muted"><?=$r2["designation"]?></div>
								<a href="chat.php" class="btn btn-default btn-sm m-t-10">Message</a>
								<a href="client-profile.php" class="btn btn-default btn-sm m-t-10">View Profile</a>
							</div>
						</div>

					<?php
			}
		?>
		</div>
<?php
		}
	}
?>		

<!-- 					echo '<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">';
					echo		'<div class="profile-widget">';
					echo		'<div class="profile-img">';
					echo			'<a href="client-profile.php" class="avatar">G</a>';
					echo		'</div>';
					echo		'<div class="dropdown profile-action">';
  		echo '<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
  	echo '<i class="fa fa-ellipsis-v"></i></a>';
					echo			'<ul class="dropdown-menu pull-right">';
				echo	'<li><a href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i>';
				 echo 	'Edit</a></li>';
	echo '<li><a href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>';
							echo '</ul>';
							echo '</div>';
	echo '<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php">'.$canme.'</a></h4>';
echo '<h5 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="client-profile.php">'.$fanme.'-'.$lname.'';
echo  '</a></h5>';
				echo '<div class="small text-muted">'.$des.'</div>';
							echo '<a href="chat.php" class="btn btn-default btn-sm m-t-10">Message</a>';
							echo '<a href="client-profile.php" class="btn btn-default btn-sm m-t-10">View Profile</a>';
							echo '</div>';
		echo '</div>'; -->