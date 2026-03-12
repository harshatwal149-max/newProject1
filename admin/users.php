<?php session_start();
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

        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
                                          <?php
                if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']); 
}
?>
              <h3 class="card-title">Users</h3>
            </div>

            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

<?php
$sr_no = 1;
$query = mysqli_query($conn, "SELECT * FROM users");

while($row = mysqli_fetch_assoc($query)) {
?>

<tr>
  <td><?php echo $sr_no++; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['password']; ?></td>
  <td>
    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
    <a href="delete_user.php?id=<?php echo $row['id']; ?>" 
       class="btn btn-sm btn-danger"
       onclick="return confirm('DELETE')">
       Delete
    </a>
  </td>
</tr>

<?php } ?>

                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</main>
<?php include('footer.php'); ?>