<?php  include('php_code.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>ToDo list application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<a href="lindex.php">Lindex</a>
  <div class="heading">
    <h2 style="font-style:'Hervetica';">ToDo List Application PHP and MySQL database</h2>
  </div>
  <form method="post" action="index.php" class="input_form">
    <input type="text" name="task" class="task_input">
    <input type="text" name="tijd" class="task_input">
    <input type="text" name="lists_id" class="task_input">
    <button type="submit" name="submit" id="add_btn" class="add_btn">Add task</button>



  </form>
<table>
  <thead>
    <tr>
      <th>Nr:</th>
      <th>Tasks:</th>
      <th>Tijd in minuten:</th>
      <th>task id:</th>
      <th>list id:</th>
      <th style="width:60px;">Action</th>
    </tr>
  </thead>
  <tbody>
  		<?php
  		// select all tasks if page is visited or refreshed
      $query = "SELECT * FROM tasks";
      if (isset($_GET['link_task'])) {
      	$id = $_GET['link_task'];

        $query = $query . " INNER JOIN lists ON tasks.lists_id = lists.id where lists.id =" . $id;
      }

  		$tasks = mysqli_query($db, $query);
  		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>

  				<td> <?php echo $i; ?> </td>
  				<td class="task"> <?php echo $row['task']; ?> </td>
          <td class="tijd"> <?php echo $row['tijd']; ?> </td>
          <td class="tasks_id"><?php echo $row['task_id']?></td>

          <td class="list_id"><?php echo $row['lists_id']?></td>
          <td>
				<a href="editId.php?edit=<?php echo $row['task_id']; ?>" class="edit_btn" >Edit</a>
			</td>
  				<td class="delete">
  					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>


  				</td>
  			</tr>
  		<?php $i++; } ?>
  	</tbody>
</body>
</html>
