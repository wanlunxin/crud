<?php 

$task = array(
	'id' => '',
	'task' => '',
	'responsible' => '',
	'status' => '',
	'action' => 'create'
);

if (isset($_GET['action'])) {
	include 'conn.php';
	if ($_GET['action'] == 'edit') {
		$id = $_GET['id'];
		$query = mysqli_query($conn, "SELECT * FROM task WHERE id = '$id'");
		while ($data = mysqli_fetch_array($query)) {
			$task['id'] = $data['id'];
			$task['task'] = $data['task'];
			$task['responsible'] = $data['responsible'];
			$task['status'] = $data['status'];
			$task['action'] = 'edit';
		}
	}
}

?>

<h3><?php echo $task['action'] ?> task</h3>

<form action="process.php" method="post">
	Task <br>
	<textarea name="task" rows="4" cols="50"><?php echo $task['task']; ?></textarea><br>
	Responsible <br>
	<input type="text" name="responsible" value="<?php echo $task['responsible']; ?>"><br><br>
	Status <br>
	<input type="radio" name="status" value="processing" <?php echo ($task['status'] == 'processing')?'checked':'' ?>>Processing
	<input type="radio" name="status" value="finished" <?php echo ($task['status'] == 'finished')?'checked':'' ?>>Finished
	<br>
	<br>
	<?php if ($task['task'] != '') { ?>
		<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
	<?php } ?>
	<input type="hidden" name="action" value="<?php echo $task['action']; ?>">
	<input type="submit" value="Create">
</form>


