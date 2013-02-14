<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
<div class="container">
  <form class="form-signin" id="login" action = "login.php" method="post">
    <fieldset>
    <legend>Login</legend>
      <input type='hidden' name='submitted' id='submitted' value='1'/>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" placeholder="Username" maxlength="50" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" placeholder="Password" maxlength="50" />
      <!--<input type="submit" name="Submit" value="Submit" />-->
      <button class="btn btn-larg btn-primary" type="submit" name="Submit" value="Submit">Submit</button>
    </fieldset>
  </form>
</div>
</body>
</html>
