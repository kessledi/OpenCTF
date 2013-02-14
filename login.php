<?php
	session_start();
       include("/home/conf/info.php"); # needs echo...
    	$connection1 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection1) or die ("cannot select DB");

	$username = mysql_real_escape_string(trim($_POST['username']));
	$password = mysql_real_escape_string(trim($_POST['password']));
	
	if(empty($username)) {
		$_SESSION['error'] = "Username is empty!";
		header('Location:./sign_in.php');
		return false;
	}
	
	if (empty($password)) {
		$_SESSION['error'] = "Password is empty!";
		header('Location:./sign_in.php');
		return false;
	}
    	$password = sha1($password);
	$query1 = "call Login(\"$username\",\"$password\");";
    	$result1 = mysql_query($query1,$connection1) or die ("login failed");
    	if(!$result1 || mysql_num_rows($result1) <= 0)
    	{
		$_SESSION['error'] = "Username and password do not match up!";
		header('Location:./sign_in.php');
        	return false;
    	}

	mysql_close($connection1);

	$connection2 = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection2) or die ("cannot select DB");

    	$query2 = "call isAdmin(\"$username\");";
	$result2 = mysql_query($query2,$connection2);
	if (mysql_num_rows($result2) > 0)
	{
		$_SESSION['admin'] = '1';
	}
	else
	{
		$_SESSION['admin'] = '0';
	}

	$_SESSION['username'] = $username;
	header('Location:https:./index.php');
	$_SESSION['success'] = "Login successful";


?>