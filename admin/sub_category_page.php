<?php
session_start();
if(!isset($_SESSION['loggedin'])){
  header("Location:login.php");
}
?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('database.php'); ?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">

          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Create Sub Category</div>
               <?php
                if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']); 
}
?>
            </div>

            <form action="save_sub_category.php" method="post">
              <div class="card-body">

                <div class="mb-3">
                  <label class="form-label">Select Category</label>
                  <select name="category_id" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php
                      $q = mysqli_query($conn, "SELECT id, category_name FROM categories WHERE status=1");
                      while($row = mysqli_fetch_assoc($q)){
                        echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                      }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Sub Category Name</label>
                  <input type="text" name="sub_category_name" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Sub Category</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
          <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Sub Categories</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">#</th>
                          <th scope="col">Category</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                               <?php
                     $q = mysqli_query($conn, "
  SELECT sc.id,c.category_name,sc.sub_category_name,sc.status FROM sub_categories sc JOIN categories c ON sc.category_id = c.id");

                      $sr_no = 1;
                      
                      while($row = mysqli_fetch_assoc($q)){
                        echo "<tr>
                      <td>{$sr_no}</td>
                     <td>{$row['category_name']}</td>
                     <td>{$row['sub_category_name']}</td>
                    <td>{$row['status']}</td>
                    <td> <a href='edit_sub_category.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='delete_sub_category.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a></td>
                    
                    </tr>";
                        
                        
$sr_no++;
                      }
                    ?>
                        
                      </tbody>
                    </table>
                  </div>
                
                </div>
              
                <!-- /.card -->
              </div>
       
      </div>
    </div>
  </div>
</main>

<?php include('footer.php'); ?>
