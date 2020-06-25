<?php

$conn = new mysqli('localhost', 'root', '', 'db_todo');

if ($conn->connect_errno) {
	echo "Failed to connect to MySQL: " . $conn->connect_error;
	exit();
}

?>