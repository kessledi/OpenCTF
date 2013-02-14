<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Scoreboard</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<?php include("nav-bar.php") ?>
</br></br></br></br>
<div class="container" id="table">
</div>

</body>
</html>

<script src="bootstrap/js/jquery-latest.js"></script>
<script type='text/javascript'>
$(document).ready(function(){
	$.post('score.php',{},function(result){
			$("#table").empty().append(result);	
		});
       var auto_refresh = setInterval(
        function () {
		$.post('score.php',{},function(result){
			$("#table").empty().append(result);	
		});
	}, 10000);
});
</script>
