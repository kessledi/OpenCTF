<?php
	session_start();
	if(isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)){
       include "/home/conf/info.php";
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");
	
	$flag_string = trim($_POST['identifier']);

	$username = trim($_POST['username']);
		
	if(empty($flag_string)) {
		$_SESSION['error'] = "No flag given";
		header('Location:./flagSubmit.php');
		return true;
	}
	
	
	
	$query1 = "call CheckFlag(\"$flag_string\");";
	$query2 = "call SubmitFlag(\"$flag_string\",\"$username\");";
	$query3 = "call UpdateScore(\"$flag_string\",\"$username\");";

	$result1 = mysql_query($query1,$connection) or die ("Flag checked failed");

	if (!$result1 || mysql_num_rows($result1) <= 0)
	{
		$_SESSION['error'] = "The flag does not exist";
		header('Location:./flagSubmit.php');
		return true;
	}
	mysql_close($connection);
   	$connection2 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection2) or die ("cannot select DB");

	if (!mysql_ping($connection2))
	{
		echo("connection gone, exiting before 2...");
		return false;
	}
	
	$result2 = mysql_query($query2,$connection2);

	if(!$result2){
		$_SESSION['error'] = "You already have this flag";
		header('Location:./flagSubmit.php');
		return true;
	}

	mysql_close($connection2);
   	$connection3 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection3) or die ("cannot select DB");
	
	$result3 = mysql_query($query3,$connection3) or die ("Score Update Failed. Please contact an Admin... oh, wait...");

	$_SESSION['success'] = "Flag granted!";
	header('Location:./admin.php');
	return true;
	}
?>