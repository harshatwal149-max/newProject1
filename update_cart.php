<?php
include('admin/database.php');

if(isset($_POST['quantity'])){

    foreach($_POST['quantity'] as $id => $qty){

        $id = intval($id);
        $qty = intval($qty);

        mysqli_query($conn,"UPDATE carts SET quantity='$qty' WHERE id='$id'");

    }

}

header("Location:carts.php");
exit();
?>