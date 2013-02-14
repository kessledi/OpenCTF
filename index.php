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
    <div class="row">
      <div class="span5">
        <h1>Capture the Flag </h1>
      </div>
      <div class="span3 offset2">
        <img src="./imgs/Hitov.jpeg" alt="Moustache"> 
      </div>
    </div>
	<?php if (!isset($_SESSION['username'])) { ?>
    <p> Welcome to Capture the Flag presented by Rose-Hulman </p>
    <a class="btn btn-primary btn-large" href="./register.php">Register</a>
	<?php }
	else { ?>
    <p> Welcome <?php echo $_SESSION['username'] ?> to Capture the Flag presented by Rose-Hulman </p>
    <a class="btn btn-primary btn-large" href="./flagSubmit.php">Submit Flag</a>
	<?php } ?>
  </div>
</header>
</body>
</html>
