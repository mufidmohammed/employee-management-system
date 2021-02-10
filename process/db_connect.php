<?php

$servername = "localhost";
$username = "root";
$password = "mufid";
$dbname = "ems";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
	die("Unable to connect to database : " . mysqli_connect_error());
}

?>
