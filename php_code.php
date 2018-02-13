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

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

  if (count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $task = $n['task'];
    $tijd = $n['tijd'];
  }
}
    ?>
