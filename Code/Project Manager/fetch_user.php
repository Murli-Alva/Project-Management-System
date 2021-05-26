<?php 
session_start();
require('../connect.php');

		$eid = $_SESSION['e_id'];
		
		$q = mysql_query('SELECT * FROM employees WHERE e_id != "'.$eid.'"');
		$output = '';
		while($r1 = mysql_fetch_array($q))
		{
			$firstname = $r1['firstname'];
			$lastname = $r1['lastname'];

		$output .='<li> 									
			    <a href="" id="kp"><span class="status offline"></span> '.$firstname.' '.$lastname.' <span class="badge bg-danger pull-right"></span><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$r1['e_id'].'" data-tousername="'.$r1['e_id'].'">Start</button></a>
			     </li>';
        }
		echo $output;

?>
