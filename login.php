<?php session_start(); ?>
<?php include('header.php');
include('admin/database.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">
        <div class="col-md-4 col-sm-10">

            <div class="card shadow login-card">
                <div class="card-body p-4">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['failed'])) {
                        echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['failed']) . '</div>';
                        unset($_SESSION['failed']);
                    }
                    ?>

                    <div class="text-center mb-4">
                        <div class="brand">🍎 FRUITKHA</div>
                        <p class="text-muted mb-0">Login to your account</p>
                    </div>

                    <form method="post" action="save_login.php">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">Password</label>

                            <input type="password" id="password" name="password"
                            class="form-control pe-5" placeholder="Enter password" required>

                            <button type="button" onclick="showPassword()"
                                style="position:absolute; right:10px; top:38px; border:none; background:none;">
                                <i id="icon" class="fa fa-eye-slash"></i>
                            </button>
                        </div>

                        

                        <div class="d-grid">
                            <button type="submit" class="btn btn-fruitkha btn-sm btn-primary">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small>
                            Don’t have an account?
                            <a href="register.php">Register</a>
                        </small>
                    </div>
                    <?php
                    $q = mysqli_query($conn, "SELECT id,email,password FROM users WHERE email");
                    $sr_no = 1;
                    while ($row = mysqli_fetch_assoc($q))
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.php'); ?>