<?php 
session_start();
include('header.php'); 
include('sidebar.php'); 
include('database.php'); 
?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">

          <form action="save_login.php" method="post">
            <div class="card card-primary card-outline mb-4">
              <div class="card-header">
                <div class="card-title">Login</div>

                <?php
                if (isset($_SESSION['success'])) {
                  echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                  unset($_SESSION['success']); 
                }
                ?>
              </div>

              <div class="card-body">
                
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</main>

<?php include('footer.php'); ?>