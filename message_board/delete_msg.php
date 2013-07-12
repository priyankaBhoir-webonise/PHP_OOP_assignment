<html>
<?php
	require_once 'db-utils.class.php'; 
	$database=new DBUtils();
	
	if(isset($_POST['submit'])){
		
		if($database->deleteMessageById($_POST['id'])===false)	
				echo 'Error : Could not delete message <br>Please go to <a href=index.php> Home page </a>';
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
		<tr><td>id : <td><input type="text" name=id /></tr>
		<tr><td colspan=2><input type="submit" name=submit value="submit" /></tr>
		</table>
	</form>
	
</body>
</html>
<?php
	}
?>
