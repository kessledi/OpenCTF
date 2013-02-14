<?php session_start() ?>
<script src="bootstrap/js/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="./index.php">Home</a>
        <u1 class="nav">
          <li class="">
            <a href="./rules.php">Rules</a>
          </li>
          <li class="">
            <a href="./scores.php">Score</a>
          </li>
<?php if (!isset($_SESSION['username'])) { ?>
          <li class="">
            <a href="./registration.php">Register</a>
          </li>
          <li class="">
            <a href="./sign_in.php">Login</a>
          </li>
<?php } else { ?>	
          <li class="">
            <a href="./begin.php">Begin</a>
          </li>
          <li class="">
            <a href="./trivia.php">Trivia</a>
          </li>
          <li class="">
            <a href="./flagSubmit.php">Submit Flags</a>
          </li>
          <li class="">
            <a href="./help.php">Help</a>
          </li>
<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == '1') { ?>
	   <li class="warning">
	     <a href="./admin.php">Admin</a>
	   </li>
	 <?php } ?>
          <li class="">
            <a href="./logout.php">Logout</a>
          </li>
	 <?php } ?>
        </u1>
    </div>
  </div>
</div>
</br></br></br>

<?php if (isset($_SESSION['error'])) { ?>
<div class="container">
<div class="alert alert-error">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<?php echo($_SESSION['error']) ?>
<?php unset($_SESSION['error']) ?>
</div>
</div>
<?php } ?>

<?php if (isset($_SESSION['success'])) { ?>
<div class="container">
<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<?php echo($_SESSION['success']) ?>
<?php unset($_SESSION['success']) ?>
</div>
</div>
<?php } ?>
