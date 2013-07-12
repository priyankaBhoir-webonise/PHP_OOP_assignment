<html>
<?php
	require_once 'db-utils.class.php'; 
	$database=new DBUtils();

	if(isset($_POST['submit'])){
		$msg=new Message(1,$_POST['author'],$_POST['sub'],date("c"),$_POST['msg']);		
		if($database->addMessage($msg)===false)
				echo 'Error : please go to <a href=index.php> Home page </a>';
		else
				header("Location: index.php");
	}
	else
	{
	include 'head.php';
?>	
<body>
	
	<form  method=post>
	
	<table border=1 align=center>
		<tr><td>Subject : <td><input type="text" name=sub /></tr>
		<tr><td>Author : <td><input type="text" name=author /></tr>
		<tr><td>Message : <td><textarea name=msg></textarea></tr>
		<tr><td>date : <td><input type="text" name=date  value="<?php echo date('c'); ?> " disabled/></tr>
		<tr><td colspan=2><input type="submit" name=submit value="submit" /></tr>
	</table>
	</form>
	
</body>
</html>
<?php
	}
?>
