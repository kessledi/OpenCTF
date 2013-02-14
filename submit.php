<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		$_SESSION['error'] = "Access denied. You are not logged in.";
		header('Location:./index.php');
	}

       include "/home/conf/info.php";
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");
	
	$flag_string = trim($_POST['flag_string']);

	$username = $_SESSION['username'];
	
	if(empty($flag_string)) {
		$_SESSION['error'] = "No flag given";
		header('Location:./flagSubmit.php');
		return true;
	}

	$query1 = "call CheckFlag(\"$flag_string\");";
	$query0 = "call numberSubmissions(\"$flag_string\");";
	$query2 = "call SubmitFlag(\"$flag_string\",\"$username\");";

	$result1 = mysql_query($query1,$connection) or die ("Flag checked failed");

	if (!$result1 || mysql_num_rows($result1) <= 0)
	{
		$_SESSION['error'] = "Ya done goofed. Try again.";
		header('Location:./flagSubmit.php');
		return true;
	}

	mysql_close($connection);
   	$connection0 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection0) or die ("cannot select DB");

	if (!mysql_ping($connection0))
	{
	echo("connection gone, exiting before 0...");
	return false;
	}

	$result0 = mysql_query($query0,$connection0);

	if (!$result0 || mysql_num_rows($result0) <= 0)
	{
		$_SESSION['error'] = "Error in checking number of previous flag submissions. Please contact system admin.";
		header('Location:./flagSubmit.php');
		return true;
	}
	
	$numberSubmissions = mysql_result($result0,0);
	$bonus = 5-$numberSubmissions;

	if ($bonus < 0) {
		$bonus = 0;
	} 

	mysql_close($connection0);

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

	$query3 = "call UpdateScore(\"$flag_string\",\"$username\",$bonus);";
	
	$result3 = mysql_query($query3,$connection3) or die ("Score Update Failed. Please contact system admin.");

	$_SESSION['success'] = "You captured the flag!";
	if ($bonus > 0) {
		$_SESSION['success'] .= "<br />You got ".$bonus." bonus points for capturing before other people!";
	} 
	header('Location:./index.php');
	return true;

?>