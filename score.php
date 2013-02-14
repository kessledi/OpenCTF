<?php
	include "/home/conf/info.php"; 
    	$connection = mysql_connect($db_loc,$db_user,$db_pass) or die ("cannot connect");
	mysql_select_db("ctf",$connection) or die ("cannot select DB");
	session_start();
	$username = "";
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];		
	}
	$query = "call GetScores()";
	$result = mysql_query($query,$connection) or die ("Failed to update scores. Check your connection.");
	$returnString = "<table class=\"table table-hover\"><thead><tr><th></th><th>Username</th><th>Score</th></tr></thead><tbody>";
	$i = 1;
	while($item = mysql_fetch_array($result)){
		$user = htmlspecialchars($item[0]);
		$score = htmlspecialchars($item[1]);
		if ($user == 'Admin') {
			continue;
		}
		else if($username == $user){
			$returnString.="<tr class=\"info\"	><td>$i</td><td>$user</td><td>$score</td></tr>";
		}
		else {
			$returnString.="<tr><td>$i</td><td>$user</td><td>$score</td></tr>";
		}
		$i+=1;
	}
	
    	$returnString.="</tbody></table>";

	echo($returnString);
	

?>

