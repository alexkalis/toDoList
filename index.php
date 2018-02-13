<?php
$errors = "";

$db = mysqli_connect("localhost", "root", "", "todo");

if (isset($_POST['submit'])) {
  if(empty($_POST['task'])) {
    $erros = "You must fill in the task";
  }else {
    $tijd = $_POST['tijd'];
    $task = $_POST['task'];
      $sql = "INSERT INTO tasks (task, tijd) VALUES ('$task','$tijd')";
    mysqli_query($db, $sql);
    header('Location: index.php');
  }
}
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
	header('location: index.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>ToDo list application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="heading">
    <h2 style="font-style:'Hervetica';">ToDo List Application PHP and MySQL database</h2>
  </div>
  <form method="post" action="index.php" class="input_form">
    <input type="text" name="task" class="task_input">
    <input type="text" name="tijd" class="task_input">
    <button type="submit" name="submit" id="add_btn" class="add_btn">Add task</button>
  </form>
<table>
  <thead>
    <tr>
      <th>Id:</th>
      <th>Tasks:</th>
      <th>Tijd in minuten:</th>
      <th style="width:60px;">Action</th>
    </tr>
  </thead>
  <tbody>
  		<?php
  		// select all tasks if page is visited or refreshed
  		$tasks = mysqli_query($db, "SELECT * FROM tasks");

  		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
  			<tr>
  				<td> <?php echo $i; ?> </td>
  				<td class="task"> <?php echo $row['task']; ?> </td>
          <td class="tijd"> <?php echo $row['tijd']; ?> </td>
  				<td class="delete">
  					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
  				</td>
  			</tr>
  		<?php $i++; } ?>
  	</tbody>
</body>
</html>
