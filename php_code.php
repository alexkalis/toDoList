<?php
$errors = "";

$db = mysqli_connect("localhost", "root", "", "todo");

if (isset($_POST['submitId'])) {
  if(empty($_POST['task'])) {
    $errors = "You must fill in the task";
  }else {
    $id = $_GET['link_task'];
    $lists_id = $_POST['lists_id'];
    $tijd = $_POST['tijd'];
    $task = $_POST['task'];
    $sqli = "INSERT INTO tasks (lists_id, task, tijd) VALUES ('$lists_id','$task','$tijd')";
    mysqli_query($db, $sqli);
    header('Location: index.php?link_task'. $id);
  }
};
if (isset($_POST['submit'])) {
  if(empty($_POST['task'])) {
    $errors = "You must fill in the task";
  }else {
    $lists_id = $_POST['lists_id'];
    $tijd = $_POST['tijd'];
    $task = $_POST['task'];
    $sqli = "INSERT INTO tasks (lists_id, task, tijd) VALUES ('$lists_id','$task','$tijd')";
    mysqli_query($db, $sqli);
    header('Location: index.php');
  }
};
if(isset($_POST['listInput'])) {
  if(empty($_POST['list'])) {
    $errors = "You must fill in the list";
  } else {
    $list = $_POST['list'];
    $sql = "INSERT INTO lists (name) VALUES('$list')";
    mysqli_query($db, $sql);
    header('Location:lindex.php');
  }
};

if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];
	mysqli_query($db, "DELETE FROM tasks WHERE task_id=".$id);
	header('location: index.php');
}



if (isset($_GET['del_task3'])) {
	$id = $_GET['del_task3'];
  $lists_id = $_GET['list_id'];
	mysqli_query($db, "DELETE FROM tasks WHERE task_id=".$id);
	header('location: indexId.php?link_task=' . $lists_id);
}




if (isset($_GET['del_task2'])) {
	$id = $_GET['del_task2'];

	mysqli_query($db, "DELETE FROM lists WHERE id=".$id);
	header('location: lindex.php');
}
// if (isset($_GET['edit'])) {
//   $id = $_GET['edit'];
//   $update = true;
//   $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
//
//   if (count($record) == 1 ) {
//     $n = mysqli_fetch_array($record);
//     $task = $n['task'];
//     $tijd = $n['tijd'];
//   }
// }



    ?>
