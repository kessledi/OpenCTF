<?php
	session_start();
	if(!isset($_SESSION['username']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != '1')
	{
		$_SESSION['error'] = "Access denied. You are not an admin.";
		header('Location:./index.php');
	}
       include "/home/conf/info.php";
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");
	
	$username = trim($_POST['username']);
		
	if(empty($username)) {
		$_SESSION['error'] = "No user given";
		header('Location:./admin.php');
		return true;
	}

	$query1 = "call CheckUser(\"$username\");";
	$query2 = "call elevateUser(\"$username\");";

	$result1 = mysql_query($query1,$connection) or die ("User check failed");

	if (!$result1 || mysql_num_rows($result1) <= 0)
	{
		$_SESSION['error'] = "The user does not exist.";
		header('Location:./admin.php');
		return true;
	}
	mysql_close($connection);
   	$connection2 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection2) or die ("cannot select DB");
	
	$result2 = mysql_query($query2,$connection2);

	if(!$result2){
		$_SESSION['error'] = "User elevation failed";
		header('Location:./admin.php');
		return true;
	}
	
	mysql_close($connection2);
   	
	$_SESSION['success'] = "User successfully elevated.";
	header('Location:./admin.php');
	return true;

?>