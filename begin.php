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
<title>Begin</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">
<h3>Welcome to Rose-Hulman's very first Capture the Flag competition.</h3>
You will utilize a <a href="http://www.backtrack-linux.org/">BackTrack Linux</a> virtual machine that has access to the vulnerable network. </br>
The vulnerable network has flags on it that you need to find and <a href="flagSubmit.php">submit</a> to score points. 
<p class="muted">Flags will be in the format flag=somelongstring or flag_somelongstring; submit the somelongstring portion.</p></br>
<p class="text-info">Once you are connected, the appropriate network to attack is <abbr title="This means you're allowed to attack any IP from the range 192.168.96.0 to 192.168.96.255."> <strong>192.168.96.0/24</strong>.</abbr> </p></br>

You'll need three things to begin using this virtual machine:
<ol>
  <li>Download and install <a href="http://www.nomachine.com/download.php">NoMachine NX client</a> for your appropriate OS</li>
  <li>The port number you are connecting to</li>
  <li>The password of the root account</li>
</ol>
<div class="row-fluid">
  <div class="span12">
    <h4>To set up NoMachine's NX client on Windows:</h4>
    <div class="row-fluid">
      <div class="span6">
        <img src="imgs/nx1.png"></br>
      </div>
      <div class="span6">
        Open NX Client for Windows </br></br>
        Type in <strong>root</strong> as your Login</br>
        Type in the password you were <strong>given</strong></br>
        Give a label to your session, such as "ctf"</br>
      </div>
    </div
    </br></br>
    <div class="row-fluid">
      <div class="span6">
        <img src="imgs/nx2.png"></br>
      </div>
      <div class="span6">
        Click <strong>Configure...</strong></br></br>
        Type in <strong>ctf.rhccdc.org</strong> for Host</br>
        Type in your port number that you were <strong>given</strong></br>
        Change Desktop to <strong>GNOME</strong></br>
        Change Display to something smaller such as 1024x768</br>
      </div>
    </div
  </div>
</div>
</div>
</br></br>
<div class="container">
  <p>For more information on capture the flag,<br/>
  please look at the following links:<br/><br/>
  <a href="http://en.wikipedia.org/wiki/Capture_the_flag#Computer_security">http://en.wikipedia.org/wiki/Capture_the_flag#Computer_security</a></br>
  <a href="http://ctf.forgottensec.com/wiki/index.php?title=Main_Page">http://ctf.forgottensec.com/wiki/index.php?title=Main_Page</a><br/>
  <a href="http://g0tmi1k.blogspot.com/2011/03/vulnerable-by-design.html">http://g0tmi1k.blogspot.com/2011/03/vulnerable-by-design.html</a><br/>
  </p>
</div>
</body>
</html>
