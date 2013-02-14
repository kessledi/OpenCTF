<?php
	session_start();
	if(!isset($_SESSION['username']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != '1')
	{
		$_SESSION['error'] = "Access denied. You are not an admin.";
		header('Location:https:./index.php');
	}
       include "/home/conf/info.php";
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");
	
	$flag_identifier = trim($_POST['flag_identifier']);

	$flag_points = trim($_POST['flag_points']);
		
	if(empty($flag_identifier)) {
		$_SESSION['error'] = "No flag identifier given";
		header('Location:./admin.php');
		return true;
	}

	if(empty($flag_points)) {
		$_SESSION['error'] = "No flag points given";
		header('Location:./admin.php');
		return true;
	}

	$query1 = "call CheckFlag(\"$flag_identifier\");";
	$query2 = "call addFlag(\"$flag_identifier\",\"$flag_points\");";

	$result1 = mysql_query($query1,$connection) or die ("Flag checked failed");

	if (!$result1 || mysql_num_rows($result1) > 0)
	{
		$_SESSION['error'] = "The flag already exists";
		header('Location:./admin.php');
		return true;
	}
	mysql_close($connection);
   	$connection2 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection2) or die ("cannot select DB");
	
	$result2 = mysql_query($query2,$connection2);

	if(!$result2){
		$_SESSION['error'] = "Flag submission failed";
		header('Location:./admin.php');
		return true;
	}
	
	mysql_close($connection2);
   	
	$_SESSION['success'] = "Flag added";
	header('Location:./admin.php');
	return true;

?>