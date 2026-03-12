<?php
session_start();
?>
<?php
include('database.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM  users WHERE id=$id");
 $_SESSION['success'] = "Delete users successfully!";
header("Location: users.php");
exit;
?>