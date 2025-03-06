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

// Handle profile update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    // Handle profile picture upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "uploads/";
        $file_name = time() . "_" . basename($_FILES["profile_picture"]["name"]);
        $target_file = $target_dir . $file_name;
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        $profile_picture = $target_file;
    } else {
        $profile_picture = $user['profile_picture']; // Keep old profile picture if not updated
    }

    // Update user details in database
    $update_query = "UPDATE users SET name='$name', email='$email', mobile='$mobile' , profile_picture='$profile_picture' WHERE id='$user_id'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['success_msg'] = "Profile updated successfully!";
        header("Location:  dashboard.php");
        exit();
    } else {
        $error_msg = "Error updating profile!";
    }
}
?>

<?php include "header.php"; ?>

<!-- Profile Edit Section -->
<div class="author-page-area pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <!-- Profile Edit Card -->
                <div class="single-blog-card blog-card-three">
                    <div class="blog-img">
                        <h2>Edit Profile</h2>
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

                        <!-- Profile Edit Form -->
                        <form action="" method="POST" enctype="multipart/form-data" class="profile-edit-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo htmlentities($user['name']); ?>" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlentities($user['email']); ?>" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email">Mobile</label>
                                <input type="tel" name="mobile" class="form-control" value="<?php echo htmlentities($user['mobile']); ?>" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control-file">
                                <div class="mt-2">
                                    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture" width="100">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "footer.php"; ?>

<style>
    /* Profile Page Styles */
.author-page-area {
    background-color: #f9f9f9;
}

.single-blog-card {
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    background-color: #fff;
    margin-bottom: 30px;
}

.blog-img {
    padding: 30px;
    text-align: center;
    background-color: #a70713;
    color: #fff;
}

.blog-img h2 {
    font-size: 28px;
    margin: 0;
    font-weight: 600;
}

.single-blog-content {
    padding: 30px;
}

.form-group label {
    font-weight: 600;
    color: #333;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    width: 100%;
}

.form-control-file {
    padding: 10px;
    font-size: 16px;
    width: 100%;
}

.btn {
    border-radius: 5px;
    font-size: 16px;
    padding: 12px;
    background-color: #a70713;
    border: none;
    color: white;
    cursor: pointer;
    margin-top: 20px;
}

.btn:hover {
    background-color: #a70713;
}

.alert {
    margin-top: 20px;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
}

</style>