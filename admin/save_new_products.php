<?php
include('database.php');

if(isset($_POST['title']) && isset($_POST['status']) && isset($_POST['categoryID'])){

  $title = $_POST['title'];
  $status = $_POST['status'];
  $categoryID = $_POST['categoryID'];

  $q = mysqli_query($conn, "INSERT INTO products (title, status, categoryID) 
                            VALUES ('$title', '$status', '$categoryID')");

  if($q){
    echo "<script>alert('Product Saved Successfully'); window.location.href='newProducts.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

} else {
  echo "All fields required!";
}
