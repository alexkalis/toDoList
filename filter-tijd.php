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
</li>
  <div class="heading">
    <h2 style="font-style:'Hervetica';">ToDo List Application PHP and MySQL database</h2>
  </div>


   </select>
<table class="table">
  <thead>
    <tr>
      <th>Nr:</th>
      <th>Tijd:</th>
      <th>Id:</th>
    </tr>
  </thead>
  <tbody>
  		<?php
  		// select all tasks if page is visited or refreshed
        $query = "SELECT tijd, task_id FROM tasks";


  		$tasks = mysqli_query($db, $query);
  		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
  				<td> <?php echo $i; ?> </td>
          <td class="tijd"> <?php echo $row['tijd']; ?> </td>
          <td class="id"> <?php echo $row['task_id']; ?> </td>
  			</tr>
  		<?php $i++; } ?>

  	</tbody>
</body>
</html>
