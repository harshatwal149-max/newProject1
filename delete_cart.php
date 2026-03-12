<?php
session_start();
?>
<?php
include('admin/database.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM  carts WHERE id=$id");
 $_SESSION['success'] = "Delete cart successfully!";
header("Location: carts.php");
exit;
?>