<html>
<?php
	require_once 'db-utils.class.php'; 
	$database=new DBUtils();

	if(isset($_POST['submit'])){
		$msg=new Message($_POST['id'],$_POST['author'],$_POST['sub'],date("c"),$_POST['msg']);
		if($database->updateMessage($msg)===false)
				echo 'Error :Could not update the message<br> please go to <a href=index.php> Home page </a>';
		else
				header("Location: index.php");
	}
	else
	{
		
		include 'head.php';
		$msg=$database->searchMessage($_GET['id']);
		if($msg===false)
				echo 'Error No such record in database: please go to <a href=index.php> Home page </a>';
		else{
			$arr=$msg->get_all();
?>	
<body>
	<form  method=post>
	
	<table border=1 align=center>
		<tr hidden><td>ID : <td><input type="text" name=id  value="<?php echo $_GET['id']; ?>" /></tr>
		<tr><td>Subject : <td><input type="text" name=sub  value="<?php echo $arr['subject']; ?>"/></tr>
		<tr><td>Author : <td><input type="text" name=author  value="<?php echo $arr['author']; ?>"/></tr>
		<tr><td>Message : <td><textarea name=msg><?php echo $arr['msgBody']; ?></textarea></tr>
		<tr><td>date : <td><input type="text" name=date  value="<?php echo $arr['msgDate']; ?>" disabled/><br> Note : date and time will be autometically changed</tr>
		<tr><td colspan=2><input type="submit" name=submit value="submit" /></tr>
	</table>
	</form>
	
</body>
</html>
<?php
	}
	}
?>
