<?php
require 'mylib/loginout.php';
basicsetup("My Databases");
$log = login($_POST["username"], $_POST["password"]);
if ($log) {
	$user=trim($_POST["username"]);
	$pass=trim($_POST["password"]);
	$mysqli=new mysqli("localhost", $user, $pass);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	$query="SHOW DATABASES;";
	if($stmt=$mysqli->query($query)){
		$mysqli->query("USE users;");
		$mysqli->query("UPDATE `u` SET `active` = 'Y' WHERE `u`.`username`='riggs';");
		while ($row=$stmt->fetch_assoc()) {
			if ($row['Database'] == 'Collectibles') {
				echo "<h2><a href='page5.php'>" . $row['Database'] . "</a></h2>";
			} elseif ($row['Database'] == "Games") {
				echo "<h2><a href='page6.php'>" . $row['Database'] . "</a></h2>";
			} else {
				echo "<h2>" . $row['Database']."</h2>";
			}
		}
	} else {
		echo $mysqli->error;
	}
	$mysqli->close();
} else {
	echo "Login information incorrect. Please try again.";
	$v="N";
	header("location: index.php?id=".$v);
}


echo "</body></html>";
?>
