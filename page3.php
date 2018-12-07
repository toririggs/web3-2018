$<?php
require "mylib/loginout.php";
$u=passuser();
$p=passpass();
$database="Collectibles";

basicsetup("Animal Crossing Amiibo");


$mysqli = mysqli_connect("localhost", $u, $p, $database);
if(!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}
$mysqli->query("USE users;");
$r = $mysqli->query("SELECT * FROM u");
$s = $r->fetch_assoc();
if ('Y' == $s['active']) {

$mysqli->query("USE $database;");
if(isset($_POST['add'])) {
	additemacamiibo($_POST["name"], $_POST["amiibo_type"], $_POST["series_num"], $_POST["card_num"], $_POST["own"], $mysqli);
}
if(isset($_POST['delete'])) {
	deleteitemacamiibo($_POST["cols"], $_POST["val"], $mysqli);
}


$query2="SELECT * FROM Animal_Crossing_Amiibo";
$result=$mysqli->query($query2);
$num=$result->num_rows;
if ($num > 0) {
	echo "<table><tr><th>Name</th><th>Amiibo Type</th><th>Series Number</th><th>Card Number</th><th>Own</th></tr>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["name"]. "</td><td>" . $row["amiibo_type"]. "</td><td>" . $row["series_num"] . "</td><td>" . $row["card_num"] . "</td><td>" . $row["have"] . "</td></tr>";}
		echo "</table>";
} else {
	echo "0 results";
}
echo "<form action='' method='post'>";
echo "Name: <input type='text' name='name'> Amiibo Type: <input type='text' name='amiibo_type'> Series Number: <input type='text' name='series_num'> Card Number: <input type='text' name='card_num'> Own: <input type='text' name='own'> <br>";
echo "<input type='submit'></form>";

echo "<div><h1> Delete </h1></div><br>";
echo "<form action='' method='post'>";
echo "<input type='radio' name='cols' value='name'> Name<br>";
echo "<input type='radio' name='cols' value='amiibo_type'> Amiibo Type<br>";
echo "<input type='radio' name='cols' value='series_num'> Series Number<br>";
echo "<input type='radio' name='cols' value='card_num'> Card Number<br>";
echo "<input type='radio' name='cols' value='have'> Own<br>";
echo "<input type='text' name='val'> <br>";
echo "<input type='submit' name='delete' value='Delete'></form>";
} else {
	header("location: index.php");
}

$mysqli->close();
echo "</body></html>";
?>
