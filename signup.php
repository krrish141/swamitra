<?php
include "./config.php"; // Database connection

$message = ''; // Variable to store the message

// Initialize variables to store old form data
$name = '';
$email = '';
$mobile = '';
$password = '';
$repeat_password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($conn, $_POST['repeat_password']);

    // Check if passwords match
    if ($password !== $repeat_password) {
        $message = "<p style='color:red;'>Passwords do not match!</p>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $check_email_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_email_query);

        if (mysqli_num_rows($result) > 0) {
            $message = "<p style='color:red;'>Email already exists!</p>";
        } else {
            // Handle profile picture upload
            $profile_picture = './assets/images/default-profile.png'; // Default image

            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = './uploads/';
                $file_tmp_name = $_FILES['profile_picture']['tmp_name'];
                $file_name = basename($_FILES['profile_picture']['name']);
                $file_path = $upload_dir . $file_name;

                // Ensure the uploaded file is an image
                $file_type = mime_content_type($file_tmp_name);
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

                if (in_array($file_type, $allowed_types)) {
                    if (move_uploaded_file($file_tmp_name, $file_path)) {
                        $profile_picture = $file_path; // Update profile picture path
                    } else {
                        $message = "<p style='color:red;'>Error uploading file.</p>";
                    }
                } else {
                    $message = "<p style='color:red;'>Invalid file type. Please upload an image.</p>";
                }
            }

            // Insert the user into the database
            $sql = "INSERT INTO users (name, email, mobile, password, profile_picture) 
                    VALUES ('$name', '$email', '$mobile', '$hashed_password', '$profile_picture')";

            if (mysqli_query($conn, $sql)) {
                $message = "<p style='color:green;'>Registration successful! Congratulations!</p>";
                // Redirect after a short delay to allow the message to be displayed
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'login.php'; // Redirect to login page
                    }, 2000);
                </script>";
            } else {
                $message = "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    }
}
?>



<!-- Display the message above the form -->





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/scrollCue.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>SWAMI MITRA INSURANCE </title>
    <link rel="icon" type="image/png" href="assets/images/headerlogo-removebg-preview.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Bootstrap CSS (Make sure to include this in the <head> section of your HTML) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (Include this before the closing </body> tag) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <!-- Start My Account Area -->
    <div class="my-account-area ptb-100 "  style="background:#ffffff">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="my-account-form login-form" style="display: flex;justify-content: center;padding: 0px;">

<img src="./assets/images/headerlogo-removebg-preview.png" alt=""
    style="height:150px; object-fit:contain">
</div>

                    <img   src="https://img.freepik.com/premium-vector/people-are-standing-near-giant-smartphone-with-umbrella-protecting-them-from-top_657438-50892.jpg?ga=GA1.1.244235183.1736331240&semt=ais_hybrid" alt="">

                </div>

                <div class="col-lg-6">
                   
                    <div class="my-account-form login-form" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1), -2px -2px 5px rgba(0, 0, 0, 0.1);">
                        <h2 style="text-align:center">Get started today
                        </h2>

                        <div>
                            <?php echo $message; ?>
                        </div>

                        <form action="signup.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required
                                            value="<?php echo htmlspecialchars($name); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required value="<?php echo htmlspecialchars($email); ?>">
                                    </div>
                                </div>

                                <!-- Add the Mobile Number Input Field -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                            required value="<?php echo htmlspecialchars($mobile); ?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password" required minlength="8">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <input type="password" name="repeat_password" id="repeat_password"
                                            class="form-control" placeholder="Repeat Password" required minlength="8">
                                        <div style="text-align:end; margin-top: 5px;">
                                            <input type="checkbox" id="showPasswords"
                                                onclick="togglePasswordVisibility()"> Show
                                            Password
                                        </div>
                                    </div>
                                </div>

                                <script>
                                function togglePasswordVisibility() {
                                    const passwordField = document.getElementById('password');
                                    const repeatPasswordField = document.getElementById('repeat_password');
                                    const checkbox = document.getElementById('showPasswords');

                                    if (checkbox.checked) {
                                        passwordField.type = 'text';
                                        repeatPasswordField.type = 'text';
                                    } else {
                                        passwordField.type = 'password';
                                        repeatPasswordField.type = 'password';
                                    }
                                }
                                </script>


                                <div class="col-lg-12 d-none">
                                    <div class="form-group">
                                        <label for="profile_picture">Profile Picture (Optional):</label>
                                        <input type="file" name="profile_picture" id="profile_picture"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="my-account-btn">
                                        <button type="submit" class="default-btn">Sign up</button>
                                     </div>

                                     <h6 class="mt-3 mb-5">Already have an account? <a href="./login.php" style="text-decoration: none;">Login</a>
                                     </h6>

                                     <h6 class="mt-5" style="text-align: center;font-weight:500; font-size:17px">By clicking on Sign up, I accept the 
                                        <a href="" style="text-decoration: none;">Terms & Conditions </a> </h6>
                                </div>


                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- Add FontAwesome CDN for eye icon -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">