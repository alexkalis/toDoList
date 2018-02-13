<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<title>Title</title>
</head>

<h2>This is a todo list</h2>


<body>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toDo";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, task FROM maandag";
$result = $conn->query($sql);

if ($result->num_rows >0) {
  while($row = $result->fetch_assoc()) {
      echo "<br> id:". $row["id"]. "- Task:". $row["task"];
  }

}else {
  echo "0 results";
}


$conn->close();

//connection to the database
// $dbhandle = mysqli_connect($hostname, $username)
//   or die("Unable to connect to MySQL");
// echo "Connected to MySQL<br>";
//
// $selected = mysqli_select_db("todo",$dbhandle)
//   or die("Could not select todo");
//   $result = mysqli_query("SELECT id FROM maandag");
// //fetch tha data from the database
// while ($row = mysqli_fetch_array($result)) {
//    echo "ID:".$row{'id'};
// }
?>

</body>
</html>
