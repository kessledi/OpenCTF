<?php
	//Source: http://www.linuxjournal.com/article/9585\
	//Checks that the email given is in the form {username}@{domain}.{extension}
	function check_email_address($email) {
  		// First, we check that there's one @ symbol, 
		// and that the lengths are right.
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			// Email invalid because wrong number of characters 
			// in one section or wrong number of @ symbols.
			return false;
  		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if
			(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
			?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
			$local_array[$i])) {
			      return false;
    			}
  		}
  		// Check if domain is IP. If not, 
  		// it should be valid domain name
  		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
   			$domain_array = explode(".", $email_array[1]);
   				if (sizeof($domain_array) < 2) {
       				 return false; // Not enough parts to domain
    				}
   				for ($i = 0; $i < sizeof($domain_array); $i++) {
    					if
					(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
					?([A-Za-z0-9]+))$",
					$domain_array[$i])) {
        					return false;
     					}
    				}
 			}
 		return true;
	}


	session_start();
       require_once('/home/conf/info.php'); 
       require_once('/home/conf/new_vm.php'); 
	require_once('captcha/recaptchalib.php');
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
	
	if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		$_SESSION['error'] = "reCAPTCH incorrect. Please try again";
		header('Location:./registration.php');
		return false;
	} else {
  	
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");

	$username = mysql_real_escape_string(trim($_POST['username']));
	$password = mysql_real_escape_string(trim($_POST['password']));
	$password_confirmation = trim($_POST['password_confirmation']);
	$email = mysql_real_escape_string(trim($_POST['email'])	);
	
	if(empty($username)) {
		$_SESSION['error'] = "No username given";
		header('Location:./registration.php');
		return true;
	}

	if(empty($password)) {
		$_SESSION['error'] = "No password given";
		header('Location:./registration.php');
		return true;
	}

	if(empty($email)) {
		$_SESSION['error'] = "No email given";
		header('Location:./registration.php');
		return true;
	}
	if(!check_email_address($email)){
		$_SESSION['error'] = "Not a valid email";
		header('Location:./registration.php');
		return true;
	}
	
 

    	$password = sha1($password);
	$portQuery = "select vmport from user";
	$query = "call Login(\"$username\",\"$password\");";
	$result = mysql_query($portQuery,$connection);
	$ports = array();
	while($item = mysql_fetch_array($result)){
		$ports[] = $item[0];
	}
    	$vmpass = generateRandomPassword(10);
	$vmport = generateRandomPort($ports);
	$addQuery = "call AddUser(\"$email\",\"$username\",\"$password\",\"$vmport\",\"$vmpass\");";
    	$result = mysql_query($addQuery,$connection);
	if(!$result){
		$_SESSION['error'] = "Registration not successful. Username might be taken.";
		header('Location:./registration.php');
		return true;
	}
	$result = mysql_query($query,$connection) or die ("Registration successful, login failed. Contact system admin.");
    	if(!$result || mysql_num_rows($result) <= 0)
    	{
    		echo("Login failed. Username/Password incorrect");
        	$this->HandleError("Error logging in. The username or password does not match.");
        	return true;
    	}
  	//create_vm($email,$vmport,$vmpass);
	$_SESSION['admin'] = 0;
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "Registration Successful! Welcome to RHIT CCDC Capture the Flag";
	header('Location:./index.php');
}


?>
