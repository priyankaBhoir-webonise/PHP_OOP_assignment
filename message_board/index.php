
<?php
	require_once 'db-utils.class.php'; 
	include 'head.php';
	 $database=new DBUtils();
	echo '<h3 align=center>message board</h3>';
	if($msgs=$database->getAllMessages()===false){
			echo '<br>Board is empty <br> Create new message';
	}
	else {
		echo '<table border=1 align=center>';
		echo "<tr><th>Message_id<th>Author<th>Subject<th>Message Date<th>Message Body </tr>";
		foreach($msgs as $msg){
			$arr=$msg->get_all();
			echo "<tr><td>$arr[id]<td>$arr[author]<td>$arr[subject]<td>$arr[msgDate]<td>$arr[msgBody]</tr>";
		}
		echo '</table>';
	}
?>
</html>
