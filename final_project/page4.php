<?php
require "mylib/loginout.php";
$u=passuser();
$p=passpass();
$database="Games";

$mysqli = mysqli_connect("localhost", $u, $p, $database);
if(!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}
$mysqli->query("USE users;");
$r = $mysqli->query("SELECT * FROM u");
$s = $r->fetch_assoc();
if ('Y' == $s['active']) {

$mysqli->close();
$newsqli = mysqli_connect("localhost", $u, $p, $database);
if(isset($_POST['add'])) {
	additemgamecube($_POST["name"], $_POST["release"], $_POST["pub"], $_POST["dev"], $_POST["own"], $_POST["rating"], $newsqli);
}
if(isset($_POST['delete'])) {
	deleteitemgamecube($_POST["cols"], $_POST["val"], $newsqli);
}
basicsetup("GameCube");

$query2="SELECT * FROM GameCube";
$result=$newsqli->query($query2);
$num=$result->num_rows;
if ($num > 0) {
	echo "<table><tr><th>Name</th><th>Release Date</th><th>Publisher</th><th>Developer</th><th>Own</th><th>ESRB Rating</th></tr>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["name"]. "</td><td>" . $row["release_date"]. "</td><td>" . $row["publisher"] . "</td><td>" . $row["developer"] . "</td><td>" . $row["have"] . "</td><td>" . $row["ESRB_rating"] . "</td></tr>";}
	echo "</table>";
} else {
	echo "0 results";
}
echo "<div><h1> Add</h1></div><br>";
echo "<form action='' method='post'>";
echo "Name: <input type='text' name='name'> Release Date: <input type='text' name='release'> Publisher: <input type='text' name='pub'> Developer: <input type='text' name='dev'> Own: <input type='text' name='own'> ESRB Rating: <input type='text' name='rating'><br>";
echo "<input type='submit' name='add' value='Add'></form>";

echo "<div><h1> Delete </h1</div><br>";
echo "<form action='' method='post'>";
echo "<input type='radio' name='cols' value='name'> Name<br>";
echo "<input type='radio' name='cols' value='release_date'> Release Date<br>";
echo "<input type='radio' name='cols' value='publisher'> Publisher<br>";
echo "<input type='radio' name='cols' value='developer'> Developer<br>";
echo "<input type='radio' name='cols' value='have'> Own<br>";
echo "<input type='radio' name='cols' value='ESRB_rating'> ESRB Rating<br>";
echo "<input type='text' name='val'> <br>";
echo "<input type='submit' name='delete' value='Delete'></form>";
} else {
	header("location: index.php");
}

$newsqli->close();
echo "</body></html>";
?>
