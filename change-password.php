<?php
session_start();
include("config.php"); // Database connection file

// Check if the user is logged in (Modify as per your authentication system)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user details from database
$user_id = $_SESSION['user_id']; // Get logged-in user ID
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($query);

// Handle password change form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Verify the current password
    if (password_verify($current_password, $user['password'])) {
        // Check if the new password matches the confirmation
        if ($new_password == $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_query = "UPDATE users SET password='$hashed_password' WHERE id='$user_id'";
            if (mysqli_query($conn, $update_query)) {
                $_SESSION['success_msg'] = "Password updated successfully!";
                header("Location: dashboard.php");
                exit();
            } else {
                $error_msg = "Error updating password!";
            }
        } else {
            $error_msg = "New password and confirmation do not match!";
        }
    } else {
        $error_msg = "Current password is incorrect!";
    }
}
?>

<?php include "header.php"; ?>

<!-- Change Password Section -->
<div class="author-page-area pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <!-- Change Password Card -->
                <div class="single-blog-card blog-card-three">
                    <div class="blog-img">
                        <h2>Change Password</h2>
                    </div>
                    <div class="single-blog-content">

                        <!-- Success or Error Message -->
                        <?php if (isset($_SESSION['success_msg'])) { ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($error_msg)) { ?>
                            <div class="alert alert-danger">
                                <?php echo $error_msg; ?>
                            </div>
                        <?php } ?>

                        <!-- Change Password Form -->
                        <form action="" method="POST" class="change-password-form">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "footer.php"; ?>
