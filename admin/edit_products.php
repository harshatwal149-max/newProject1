<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('database.php'); ?>

<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-6">

                    <?php
                    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                    $q = mysqli_query($conn, "SELECT  id,category_id,sub_category_id,product_name,product_price,discount_price,status FROM products WHERE id=$id");
                    while ($row = mysqli_fetch_assoc($q)) {
                    ?>
                        <form action="update_products.php" method="post">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">


                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">product name</label>
                                            <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>" class="form-control" required>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">product price</label>
                                                <input type="text" name="product_price" value="<?php echo $row['product_price'] ?>" class="form-control" required>
                                            </div>

                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">discount price</label>
                                                    <input type="text" name="discount_price" value="<?php echo $row['discount_price'] ?>" class="form-control" required>
                                                </div>

                                                 <label class="form-label">Status</label>
                                    <select name="status" value="<?php echo $row['status'] ?>" class="form-select" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                        </form>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save products</button>
                        </div>

                    <?php } ?>
                    <?php include('database.php'); ?>