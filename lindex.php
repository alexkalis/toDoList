<?php  include('php_code.php'); ?>
<!DOCTYPEhtml>
<html>
<head>
  <title>list application</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <li class="home">
  <a href="index.php" class="button">Index</a>
  <a href="lindex.php" class="button">Lindex</a>
  <a href="filter-tijd.php" class="button">Filter</a>
</li>
  <div class="heading">
    <h2 style="font-style:'Hervetica';">List Application PHP and MySQL database</h2>
  </div>

  <form method="post" action="lindex.php" class="input_form ">
    <input type="list" name="list" class="task_input" placeholder="de naam van de lijst">
    <button type="submit" name="listInput" id="add_btn" class="add_btn">Add list</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>Nr:</th>
        <th>Naam:</th>
        <th>Id:</th>
        <th style="width:60px;">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        // select all tasks if page is visited or refreshed
        $lists = mysqli_query($db, "SELECT * FROM lists");

        $i = 1; while ($row = mysqli_fetch_array($lists)) { ?>
            <td> <?php echo $i; ?> </td>
            <td class="lists"> <?php echo $row['name']; ?> </td>
            <td class="lists"> <?php echo $row['id']; ?> </td>

        <td><a href="indexId.php?link_task=<?php echo $row['id']; ?>" class="edit_btn" >Link</a></td>
        <td><a href="ledit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a></td>

            <td class="delete">
              <a href="lindex.php?del_task2=<?php echo $row['id'] ?>">x</a>
            </td>

          </tr>

        <?php $i++; } ?>
      </tbody>
    </table>
</body>
