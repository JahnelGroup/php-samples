<?php
require_once "db_connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $query);
}
?>

<html>
<body>
<button type="submit"><a href="index.php">View all Todo</a></button>
    <?php
        if($delete){
            echo '<p>Todo successfully deleted</p>';
        }else{
            echo '<p>Unable to delete.</p>';
        }
    ?>
</body>
</html>