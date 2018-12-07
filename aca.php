<?php

$username="riggs";
$password="riggs";
$database="Collectibles";
$mysqli = mysqli_connect("localhost", $username, $password, $database); 

if(!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "<html><head><title>Organize My Stuff</title></head><body>";
echo "Connected successfully<br>";

$query2="SELECT * FROM Animal_Crossing_Amiibo";
$result=$mysqli->query($query2);
$num=$result->num_rows;
if ($num > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "Name: " . $row["name"]. " Amiibo Type: " . $row["amiibo_type"]. " Series Number: " . $row["series_num"] . " Card Number: " . $row["card_num"] . " Own: " . $row["have"] . "<br>";}
} else {
	echo "0 results";
]
$mysqli->close();
echo "</body></html>";
?>
