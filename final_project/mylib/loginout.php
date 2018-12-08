<?php

function login($u, $p){
	$readuser = fopen("/var/www/html/mylib/mysqlusers.txt", "r") or die("Unable to open file. Error.");
	$mysqluser = trim(fgets($readuser));
	$mysqlpass = trim(fgets($readuser));
	if (($u == $mysqluser) and ($p == $mysqlpass)){
		$loginfo = fopen("/var/www/html/mylib/info.txt", "w") or die("Unable to open file. ERROR");
		fwrite($loginfo, $u);
		fwrite($loginfo, "\n");
		fwrite($loginfo, $p);
		fwrite($loginfo, "\n");
		fclose($loginfo);
		$ret = true;
		return $ret;
	} else {
		echo "You done hecked up.";
		$ret = false;
		return $ret;
	}
}
function passuser(){
	$read=fopen("/var/www/html/mylib/info.txt", "r") or die("can't read this file");
	$u=trim(fgets($read));
	return $u;
}
function passpass(){
	$read=fopen("/var/www/html/mylib/info.txt", "r") or die("can't read this file");
	$trash=fgets($read);
	$p=trim(fgets($read));
	return $p;
}
function logout(){
	$loginfo = fopen("/var/www/html/mylib/info.txt", "w") or die("Unable to open file. ERROR");
	fwrite($loginfo, "");
	fclose();
}
function additemacamiibo($name, $amiibo, $series, $card, $own, $mysqli){
	$q="INSERT INTO `Animal_Crossing_Amiibo` (`id`, `name`, `amiibo_type`, `series_num`, `card_num`, `have`) VALUES (NULL, \"" . $name . "\", \"" . $amiibo . "\", '" . $series . "', '" . $card . "', '" . $own . "');";
	$result=$mysqli->query($q);
}
function basicsetup($title){
	echo "<html><head>";
	echo '<link rel="stylesheet" type="text/css" href="mylib/styles.css">';
	echo "<title>" . $title .  "</title></head><body>";
}
function additemgamecube($name, $release, $pub, $dev, $own, $rating, $mysqli){
	$q="INSERT INTO `GameCube` (`id`, `name`, `release_date`, `publisher`, `developer`, `have`, `ESRB_rating`) VALUES (NULL, '" . $name . "', '" . $release . "', '" . $pub . "', '" . $dev . "', '" . $own . "', '" . $rating . "');";
	$mysqli->query($q);
	echo $name;
}

function deleteitemgamecube($radio, $name, $mysqli){
	$q="DELETE from GameCube where " . $radio . "='" . $name . "';";
	$mysqli->query($q);
}

function deleteitemacamiibo($radio, $name, $mysqli){
	$q="DELETE from Animal_Crossing_Amiibo where " . $radio . "='" . $name . "';";
	$mysqli->query($q);
}

function assignno(){
	$readuser = fopen("/var/www/html/mylib/mysqlusers.txt", "r") or die("Unable to open file");
	$rootu = trim(fgets($readuser));
	$rootp = trim(fgets($readuser));
	$mysqli=new mysqli("localhost", $rootu, $rootp);
	$mysqli->query("USE users;");
	$mysqli->query("UPDATE `u` SET `active` = 'N' WHERE `u`.`username`='riggs';");
	$r=$mysqli->query("SELECT * FROM u");
	$s=$r->fetch_assoc();
	$mysqli->close();
}
?>
