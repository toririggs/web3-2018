<?php

require "mylib/loginout.php";
$u=passuser();
$p=passpass();
$database="Games";
basicsetup($database);

$mysqli=mysqli_connect("localhost", $u, $p, $database);

if(!$mysqli) {
	die("connection failed");
}

$mysqli->query("USE users;");
$r = $mysqli->query("SELECT * FROM u");
$s = $r->fetch_assoc();
if ('Y' == $s['active']) {

$mysqli->query("USE " . $database . ";");
$result=$mysqli->query("SHOW TABLES;");
while ($name=mysqli_fetch_row($result)){
	echo "<h2><a href='page4.php'>" . $name[0] . "</a></h2><br>";
}
} else {
	header("location: index.php");
}

$mysqli->close();
echo "</body></html>";
?>
