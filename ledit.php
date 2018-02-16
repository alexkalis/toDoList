<?php
// including the database connection file
$db = mysqli_connect("localhost", "root", "", "todo");

if(isset($_POST['update1']))
{
    $id = $_POST['edit'];

    $name=$_POST['name'];

    // checking empty fields

      if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
    } else {
        //updating the table

        $sqli = "UPDATE lists SET name='$name' WHERE id=$id";
        mysqli_query($db, $sqli);
        //redirectig to the display page. In our case, it is index.php
        header("Location: lindex.php");
    }
}
?>
<?php
//getting id from url

$id = $_GET['edit'];
$query = "SELECT * FROM lists WHERE id=" .$id;
//selecting data associated with this particular id
$result = mysqli_query($db, $query);

while($res = mysqli_fetch_array($result))
{
    $name = $res ['name'];
}
?>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="ledit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="edit" value=<?php echo $_GET['edit'];?>></td>
                <td><input type="submit" name="update1" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
