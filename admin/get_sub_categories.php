<?php
include('database.php');

if(!isset($_POST['category_id']) || $_POST['category_id'] == ''){
    echo "<option value=''>Select Sub Category</option>";
    exit;
}


$category_id = $_POST['category_id'];


$q = mysqli_query($conn, "SELECT id, sub_category_name 
                          FROM sub_categories 
                          WHERE category_id='$category_id' AND status=1");

if(mysqli_num_rows($q) == 0){
    echo "<option value=''>No Sub Category Found</option>";
    exit;
}

echo "<option value=''>Select Sub Category</option>";

while($row = mysqli_fetch_assoc($q)){
    echo "<option value='{$row['id']}'>{$row['sub_category_name']}</option>";
}
