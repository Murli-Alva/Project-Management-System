<?php

	$connect = new PDO("mysql:host=localhost;dbname=projectcafe", "root", "");

	$to_user_id = $_POST['to_user_id'];
	$from_user_id = $_POST['from_user_Id'];
	$output = '';

 	$query = "SELECT * FROM chat_message 
			 WHERE (from_user_id = '".$from_user_id."' 
			 AND to_user_id = '".$to_user_id."') 
			 OR (from_user_id = '".$to_user_id."' 
			 AND to_user_id = '".$from_user_id."') 
			 ";/*ORDER BY timestamp DESC*/
			 
 	$statement = $connect->prepare($query);
 	$statement->execute();
 	$result = $statement->fetchAll();

 	$output = '<div class="chats">';

	foreach($result as $row)
 	{ 		
 		if($row["from_user_id"] == $from_user_id)
  		{		
		$output .= '<div class="chat chat-right">
		 			<div class="chat-body">
					<div class="chat-bubble">
					<div class="chat-content">
						<p>'.$row['msg'].'</p>
						<span class="chat-time">'.$row['timestamp'].'</span>
					</div>
					<div class="chat-action-btns">
						<ul>														
							<li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>';
		}
		else
		{
		$output .=	'<div class="chat chat-left">													
			    <div class="chat-body">													
				<div class="chat-bubble">
					<div class="chat-content">
						<p>'.$row['msg'].'</p>
						<span class="chat-time">'.$row['timestamp'].'</span>
					</div>
					<div class="chat-action-btns">
						<ul>													
							<li><a href="#" class="del-msg" title="Delete"><i class="fa fa-trash-o"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>														
			</div>';
		}
	}
	$output .= '</div>';	
	echo $output; 	 
?>