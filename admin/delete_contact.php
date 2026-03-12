<?php
session_start();
?>
<?php
include('database.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM  contacts WHERE id=$id");
 $_SESSION['success'] = "Delete leads successfully!";
header("Location: contact.php");
exit;
?>