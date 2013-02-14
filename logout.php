<?php
	
	session_start();
	if(!isset($_SESSION['username']))
	{
		$_SESSION['error'] = "Error: you are not logged in.";
		header('Location:./index.php');
	}

	//$_SESSION = array();
	unset($_SESSION['username']);
	header('Location:./index.php');
	
?>