<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('Location:./sign_in.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Flag Submission Page</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">
<form id="submit_flag" action = "submit.php" method="post">
<fieldset>
<legend>Flag</legend>
Note: Flags are case sensitive.<br/>
Flags will be in the format flag=somelongstring or flag_somelongstring; submit the somelongstring portion.<br/><br/>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="flag_string" >Flag String:</label>
<input type="text" name="flag_string" id="flag_string" maxlength="50" /><br />
<!--<input type="submit" name="Submit" value="Submit" />-->
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</fieldset>
</form>
</div>

</body>
</html>
