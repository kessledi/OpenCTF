<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		$_SESSION['error'] = "Access denied. You are not logged in.";
		header('Location:./index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Rose-Hulman CTF</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<header class="hero-unit">
  <div class="container">
	<p class="text-info">These are bonus question worth 100 points each. </p></br>
  <form id="login" action = "trivia_check.php" method="post">
    <fieldset>
      <p>Social Engineering / Spearphishing type questions:</p>
      <label for="q1">What is Nadine's office phone number?</label>
      <input type="text" name="q1" id="q1"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      <label for="q2">Where did Nadine get her doctorate?</label>
      <input type="text" name="q2" id="q2"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      <label for="q3">What is Nadine's child's name?</label>
      <input type="text" name="q3" id="q3"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      </br></br>
      <p>OSINT and reconnaisance type questions:</p>
      <label for="q4">What is the IP address of ctf.rhccdc.org?</label>
      <input type="text" name="q4" id="q4"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      <label for="q5">What is the thumbprint for SSL certificate for ctf.rhccdc.org?</label>
      <input type="text" name="q5" id="q5"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      <label for="q6">What web server is running ctf.rhccdc.org?</label>
      <input type="text" name="q6" id="q6"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
      <label for="q7">What cookie is set when visiting ctf.rhccdc.org?</label>
      <input type="text" name="q7" id="q7"/>
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
    </fieldset>
  </form>
  </div>
</header>
</body>
</html>
