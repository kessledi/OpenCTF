<?php
	if(!isset($_SESSION['username']))
	{
		$_SESSION['error'] = "Access denied. Log in please";
		header('Location:./index.php');
	}
	session_start();
       include("/home/conf/answers.php");
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];
	$q6 = $_POST['q6'];
	$q7 = $_POST['q7'];
	$_SESSION['success'] = "";
	$delimiter = "<br/>";
	if(!empty($q1) && (strtolower($q1) == $q1_answer)) {
		$_SESSION['success'] .= $q1_flag.$delimiter;
	}
	if(!empty($q2) && (strtolower($q2) == $q2_answer)) {
		$_SESSION['success'] .= $q2_flag.$delimiter;
	}
	if(!empty($q3) && (strtolower($q3) == $q3_answer)) {
		$_SESSION['success'] .= $q3_flag.$delimiter;
	}
	if(!empty($q4) && (strtolower($q4) == $q4_answer)) {
		$_SESSION['success'] .= $q4_flag.$delimiter;
	}
	if(!empty($q5) && (strtolower($q5) == $q5_answer)) {
		$_SESSION['success'] .= $q5_flag.$delimiter;
	}
	if(!empty($q6) && (strtolower($q6) == $q6_answer)) {
		$_SESSION['success'] .= $q6_flag.$delimiter;
	}
	if(!empty($q7) && (strtolower($q7) == $q7_answer)) {
		$_SESSION['success'] .= $q7_flag.$delimiter;
	}
	if($_SESSION['success'] == "" ){
		$_SESSION['error'] = "No questions correct!";
		unset($_SESSION['success']);
	}
	header('Location:./trivia.php');

?>