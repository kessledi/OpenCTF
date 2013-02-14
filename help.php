<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('Location:https://ctf.rhccdc.org/sign_in.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Help</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">
<p class="text-info">Below is a webchat applet that will connect you to irc.freenode.net with the channel #rhctf. Please ask your questions there.</p></br>
</div>
<div class="container">
<iframe src="http://webchat.freenode.net/?nick=<?php print $_SESSION['username'] ?>&channels=rhctf" width="647" height="400"></iframe>
</div>
</body>
</html>
