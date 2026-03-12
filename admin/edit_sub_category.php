<?php
session_start();?>
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

                    $q = mysqli_query($conn, "SELECT  id,category_id,sub_category_name,status FROM sub_categories WHERE id=$id");
                    while ($row = mysqli_fetch_assoc($q)) {
                    ?>
                
                        <form action="update_sub_category.php" method="post">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">

                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">sub category name</label>
                                    <input type="text" name="sub_category_name" value="<?php echo $row['sub_category_name'] ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" value="<?php echo $row['status'] ?>" class="form-select" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Category</button>
                                </div>
                        </form>



                    <?php }
                    ?>

                    <?php include('footer.php'); ?>