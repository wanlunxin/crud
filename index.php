<style type="text/css">
	table {
		border-collapse: collapse;
	}

	td, th {
		border: 1px solid #999;
		padding: 0.5rem;
		text-align: left;
	}
</style>

<?php

include 'mycon.php';

$query = mysqli_query($con, "SELECT * FROM task");

$tasks = [];
while ($task = mysqli_fetch_array($query)) {
	$tasks[] = $task;
}

?>

<h3>Tasks List</h3>

<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Id</th>
			<th>Task</th>
			<th>Datetime</th>
			<th>Responsible</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($tasks as $key => $value) { ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['task']; ?></td>
				<td><?php echo $value['date']; ?></td>
				<td><?php echo $value['responsible']; ?></td>
				<td><?php echo $value['status']; ?></td>
				<td>
					<a href="form.php?action=edit&id=<?php echo $value['id']; ?>">edit</a> |
					<a href="process.php?action=delete&id=<?php echo $value['id']; ?>">Delete</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>

<br>
<br>

<a href="/form.php">Add task</a>