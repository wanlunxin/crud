<?php

include 'conn.php';

// handle posts
if (isset($_POST['action'])) {
	if ($_POST['action'] == 'create') {
		$task = $_POST['task'];
		$responsible = $_POST['responsible'];
		$status = $_POST['status'];
		$query = mysqli_query($conn, "INSERT INTO task (task, responsible, status) VALUES ('$task', '$responsible', '$status')");
		if ($query) {
			echo "Successfully add a new task.";
			echo "<br><br>";
			echo "<a href='/'>Tasks list</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href='/form.php'>Add task</a>";
		} else {
			echo "Failed add the new task.";
			echo "<br><br>";
			echo "<a href='/form.php'>Add task</a>";
		}
	}

	if ($_POST['action'] == 'edit') {
		$id = $_POST['id'];
		$task = $_POST['task'];
		$responsible = $_POST['responsible'];
		$status = $_POST['status'];

		$query = mysqli_query($conn, "UPDATE task SET task = '$task', responsible = '$responsible', status = '$status' WHERE id = '$id'");

		if ($query) {
			echo "Successfully add a new task.";
			echo "<br><br>";
			echo "<a href='/'>Tasks list</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a href='/form.php'>Add task</a>";
		} else {
			echo "Failed add the new task.";
			echo "<br><br>";
			echo "<a href='/form.php'>Add task</a>";
		}
	}
}

// handle gets
if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete') {
		$id = $_GET['id'];
		$query = mysqli_query($conn, "DELETE FROM task WHERE id = '$id'");
		if ($query) {
			header('Location: /index.php');
		}
	}
}
