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
	$query = "call GetAllFlags()";
	
	$result = mysql_query($query,$connection) or die ("Failed to get flags, Contact an admi... oh wait...");
	$dropdown = "<select id=\"identifier\" name=\"identifier\">";
	

	while($item = mysql_fetch_array($result)){
		$flag = htmlspecialchars($item[0]);
		$dropdown.="<option value=\"$flag\">$flag</option>";
	}
	
	$dropdown.= "</select>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Administration Page</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">

<!-- Flag -->

<form id="add_flag" action = "flagAdd.php" method="post">
<fieldset>
<legend>Add Flag</legend>
Use this to add a new flag to the database.<br /><br />
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="flag_identifier" >Flag Identifier:</label>
<input type="text" name="flag_identifier" id="flag_identifier" maxlength="50" /><br />
<label for="flag_points" >Flag Points:</label>
<input type="text" name="flag_points" id="flag_points" maxlength="50" /><br />
<!--<input type="submit" name="Submit" value="Submit" />-->
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</fieldset>
</form>
</div>
<br />

<!-- Remove User -->

<div class="container">
<form id="remove_user" action = "removeUser.php" method="post">
<fieldset>
<legend>Remove User</legend>
Use this to remove a user from the game. This will remove all references to the user in the database.<br /><br />
<b>Warning: Once a user is removed, the user must re-register in order to be added back. There is no way to reverse this operation.</b><br /><br />
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="username" >Username:</label>
<input type="text" name="username" id="username" maxlength="50" /><br />
<!--<input type="submit" name="Submit" value="Submit" />-->
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</fieldset>
</form>
</div>
<br />

<!-- Elevate User -->

<div class="container">
<form id="elevate_user" action = "elevateUser.php" method="post">
<fieldset>
<legend>Elevate User</legend>
Use this to elevate a user to admin status.<br /><br />
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="username" >Username:</label>
<input type="text" name="username" id="username" maxlength="50" /><br />
<!--<input type="submit" name="Submit" value="Submit" />-->
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</fieldset>
</form>
</div>
<br />

<!-- Grant Flag -->

<div class="container">
<form id="grant_flag" action = "grantFlag.php" method="post">
<fieldset>
<legend>Grant Flag to user</legend>
Use this to grant a flag to a user.<br /><br />
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="username" >Username:</label>
<input type="text" name="username" id="username" maxlength="50" /><br />
<label for="username" >Flag Identifier:</label>
<?php echo($dropdown) ?>
<br />
<!--<input type="submit" name="Submit" value="Submit" />-->
<button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
</fieldset>
</form>
</div>



</body>
</html>
