<?php
// including the database connection file
$db = mysqli_connect("localhost", "root", "", "todo");



if(isset($_POST['update']))
{
    $list_id = $_GET['list_id'];
    $id = $_GET['edit'];

    $task=$_POST['task'];
    $tijd=$_POST['tijd'];
    $lists_id=$_POST['lists_id'];

    // checking empty fields
    if(empty($task) || empty($tijd) || empty($lists_id)) {
        if(empty($task)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($tijd)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if(empty($lists_id)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE tasks SET task='$task',tijd='$tijd',lists_id='$lists_id' WHERE task_id= $id";
        mysqli_query($db, $sql);

        //redirectig to the display page. In our case, it is index.php
        header("Location: indexId.php?link_task=" . $list_id);
    }
}
?>
<?php
//getting id from url

$id = $_GET['edit'];
$list_id = $_GET['list_id'];
$query = "SELECT * FROM tasks WHERE task_id=" .$id;
//selecting data associated with this particular id
$result = mysqli_query($db, $query);


while($res = mysqli_fetch_array($result))
{
    $task = $res ['task'];
    $tijd = $res ['tijd'];
    $lists_id = $res ['lists_id'];
}
?>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <a href="lindex.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Task</td>
                <td><input type="text" name="task" value="<?php echo $task;?>"></td>
            </tr>
            <tr>
                <td>Tijd</td>
                <td><input type="text" name="tijd" value="<?php echo $tijd;?>"></td>
            </tr>
            <tr>
                <td>List id</td>
                <td><input type="text" name="lists_id" value="<?php echo $lists_id;?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="update"></td>
                <td><input type="hidden" name="edit" value=<?php echo $_GET['edit'];?>></td>
            </tr>
        </table>
    </form>
</body>
</html>
