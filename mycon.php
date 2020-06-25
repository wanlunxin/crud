<?php

$con = new mysqli('localhost', 'root', '', 'db_todo');

if ($con->connect_errno) {
	echo "Failed to connect to MySQL: " . $con->connect_error;
	exit();
}

?>