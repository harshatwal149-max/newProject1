<?php include('header.php'); ?>
<?php include('admin/database.php');?>
<link rel="stylesheet" href="assets/css/register.css">
<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$q = mysqli_query($conn, "SELECT id, name, email, password, role FROM users WHERE id = $id");
$user = mysqli_fetch_assoc($q);
?>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">
        <div class="col-md-5 col-sm-11 col-lg-4">

            <div class="card shadow register-card">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <div class="brand">🍎 FRUITKHA</div>
                        <p class="text-muted mb-0">Create your account</p>
                    </div>

                    <form method="post" action="save_register.php">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Create password" required>
                            
                            <button type="button" onclick="showPassword()"
                                style="position:absolute; right:10px; top:38px; border:none; background:none;">
                                 <i id="icon" class="fa fa-eye-slash"></i>
                            </button>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-fruitkha">Register</button>
                        </div>
                    </form>
                     <div class="text-center mt-3">
                        <small>
                            Don’t have an account?
                            <a href="login.php">login</a>
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<?php include('footer.php'); ?>
