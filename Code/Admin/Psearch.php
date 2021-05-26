<?php

	require ('../connect.php');

	if(isset($_POST))
	{
		$pname = $_POST['pname'];
	                     
		$q1 = mysql_query('SELECT COUNT(*) FROM projects WHERE  `p_name` LIKE "'.$pname.'%"');

		while($r1 = mysql_fetch_array($q1))
		{
			$c = $r1['0'];
		}
		if($c==0)
		{
			echo "<div class='well bg-warning'><h4 class='text-white'>No Result Found For ".$pname."..</h4></div>";
		}
		else
		{
			
		}
?>