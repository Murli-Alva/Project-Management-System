<?php 
session_start();
require('../connect.php');

	$to_id = $_POST['to_user_id'];
	$from_id = $_POST['from_user_Id'];
	$msg = $_POST['chat_message'];

	if($msg!='')
	{	
		$query = "
		INSERT INTO chat_message (to_user_id, from_user_id, msg) 
		VALUES (".$to_id.",".$from_id.",'".$msg."')";

		if(mysql_query($query))
		{
			echo "raw insert";
		}
		else
		{
			echo "error...";
		}
	}
	else
	{
		echo "message empty..";
	}
?>
