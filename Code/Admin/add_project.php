<?php

if(isset($_POST['submit'])) 
	{
		require('../connect.php');

		$projectname = $_POST['projectname'];
		$c_name = $_POST['c_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];		
		$p_manager = $_POST['p_manager'];
		$priority = $_POST['priority'];
		$project_description = $_POST['project_description'];
		$ifile = $_POST['ifile'];

		$sql = "INSERT INTO projects (p_name, client_id, ps_date, pe_date, priority, e_id, p_Description) 
				VALUES ('$projectname',11,'$start_date','$end_date','high',15,'$project_description');";
		
			mysql_query($sql);
				
			header("Location:projects.php");
			exit();	
	}
?> 