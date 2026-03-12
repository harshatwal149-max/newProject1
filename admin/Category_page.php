<?php 
session_start();
if(!isset($_SESSION['loggedin'])){
  header("Location:login.php");
}

include('header.php'); 
include('sidebar.php'); 
 include('database.php');
if(!isset($_SESSION['loggedin'])){
  header("Location:login.php");
}
?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">

          <form action="save_category.php" method="post">
            <div class="card card-primary card-outline mb-4">
              <div class="card-header">
                <div class="card-title">Create Category</div>
                <?php
                if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']); 
}
?>
              </div>

              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label">Category Name</label>
                  <input type="text" name="category" class="form-control" required>
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
                <button type="submit" class="btn btn-primary">Save Category</button>
              </div>
            </div>
          </form>

        </div>
        <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Categories</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">#</th>
                          <th scope="col">Category</th>
                          <th scope="col">Status</th>
                          <th scope="col">edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                               <?php
                      $q = mysqli_query($conn, "SELECT id, category_name ,status FROM categories WHERE status=1");
                      $sr_no = 1;
                      while($row = mysqli_fetch_assoc($q)){
                        echo "<tr >
                       
                       <td>{$sr_no}</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['status']}</td>
                         <td> <a href='edit_category.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                         <a href='delete_category.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a></td>
                        </tr>
                        ";
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
