<?php

	require ('../connect.php');

	if(isset($_POST))
	{
		$ename = $_POST['ename'];
	                     
		$q1 = mysql_query('SELECT COUNT(*) FROM employees WHERE firstname LIKE "'.$ename.'%"');

		while($r1 = mysql_fetch_array($q1))
		{
			$c = $r1['0'];
		}
		if($c==0)
		{
			echo "<div class='well bg-warning'><h4 class='text-white'>No Result Found For ".$ename."..</h4></div>";
		}
		else
		{
	
		?>	
		<div class="row staff-grid-row" >												

			<?php
							$q2 = mysql_query('SELECT * FROM employees WHERE firstname LIKE "'.$ename.'%"');

							while($r2 = mysql_fetch_array($q2))
							{
									$fanme = $r2["firstname"];
									$lname = $r2["lastname"];
									$des = $r2["designation"];

							echo '<div class="col-md-4 col-sm-4 col-xs-6 col-lg-3">';
							echo  '<div class="profile-widget">';
							echo 	'<div class="profile-img">';
							echo	'<a href="profile.php"><img class="avatar" src="../assets/img/user.jpg" alt=""></a>';
							echo	'</div>';
							echo	'<div class="dropdown profile-action">';
							echo'<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
							echo '<i class="fa fa-ellipsis-v"></i></a>';
							echo		'<ul class="dropdown-menu pull-right">';
						echo '<li><a href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5">';
							echo '</i> Edit</a></li>';
echo '<li><a href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a></li>';
								echo '</ul>';
								echo '</div>';	
				echo '<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="profile.php">'.$fanme.'-'.$lname.'</a></h4>';
				echo		'<div class="small text-muted">'.$des.'</div>';
							echo	'</div>';
							echo    '</div>';

							}							
						
				echo	'</div>'; 
	}
}
 ?>
