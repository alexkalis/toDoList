<?php  include('php_code.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>ToDo list application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <li class="home">
  <a href="index.php" class="button">Index</a>
  <a href="lindex.php" class="button">Lindex</a>
  <a href="filter-tijd.php" class="button">Filter</a>
</li>
  <div class="heading">
    <h2 style="font-style:'Hervetica';">ToDo List Application PHP and MySQL database</h2>
  </div>
  <form method="post" action="indexid.php" class="input_form">
    <input type="text" name="task" class="task_input" placeholder="de taak">
    <input type="text" name="tijd" class="task_input" placeholder="de tijd">
    <input type="text" name="lists_id" class="task_input" placeholder="het lists_id">
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
          <td class="task_id"><?php echo $row['task_id']?></td>
          <td class="list_id"><?php echo $row['lists_id']?></td>
          <td>
				<a href="editId.php?edit=<?php echo $row['task_id']; ?>" class="edit_btn" >Edit</a>
			</td>
  				<td class="delete">
  					<a href="indexId.php?del_task3=<?php echo $row['task_id']?>&list_id=<?php echo $row['lists_id']?>">x</a>
  				</td>
  			</tr>
  		<?php $i++; } ?>

  	</tbody>
</body>
</html>
