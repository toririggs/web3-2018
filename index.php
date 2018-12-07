<?php

require "mylib/loginout.php";

basicsetup("Organize my Stuff");

echo "<h1 style='font-size:70px; text-align:center'>Login:</h1><br>";

echo "<form action='page2.php' method='post'>";
echo "Username: <input type='text' name='username'><br>";
echo "Password: <input type='password' name='password'><br><br>";
echo "<input type='submit'></form>";

$str=$_GET['id'];
if ($str=="N") {echo "<p style='text-align:center'>Login information incorrect.</p>"; }

echo "</body></html>";
?>
