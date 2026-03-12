<?php
$conn = mysqli_connect("localhost", "root", "root", "ecommerce");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
