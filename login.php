<?php
include "./config.php"; // Database connection

// Start session to check if the user is already logged in
session_start();

// Initialize message variable
$msg = "";

// Check if the user is already logged in, if yes, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}


if (isset($_GET['success']) && $_GET['success'] == 2) {
    $msg = "<p style='color: green;'>A password reset form has been sent to your registered email address. Please use the link provided in the email to update your password</p>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user data from the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            $msg = "<p>Login successful! Welcome, " . $user['name'] . "</p>";
            // Redirect to dashboard or home page
            header("Location: dashboard.php");
            exit;
        } else {
            $msg = "<p>Invalid password!</p>";
        }
    } else {
        $msg = "<p>User does not exist!</p>";
    }
}


?>

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
    <div class="my-account-area pt-100 pb-100" style="    background-color: #ffffff">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="my-account-form login-form" style="display: flex;justify-content: center;padding: 0px;">

                        <a href="./index.php">
                            <img src="./assets/images/headerlogo-removebg-preview.png" alt=""
                                style="height:150px; object-fit:contain">
                        </a>
                    </div>
                    <img src="https://img.freepik.com/premium-vector/car-insurance-concept-insurance-policy-clipboard-car-document-report-with-shield_625536-2111.jpg?ga=GA1.1.244235183.1736331240&semt=ais_hybrid"
                        alt="" style="height: 350px;">

                </div>

                <div class="col-lg-6">

                    <div class="my-account-form login-form"
                        style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1), -2px -2px 5px rgba(0, 0, 0, 0.1);">
                        <h2 style="text-align:center">Log In To Your Account</h2>
                        <div style="color: red;">

                            <?php echo $msg; ?>

                        </div>
                        <form action="login.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" id="password" required>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="showPassword"
                                            onclick="togglePasswordVisibility()">
                                        <label class="form-check-label" for="showPassword">Show Password</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="my-account-btn mb-4">
                                        <button type="submit" class="default-btn">Log In</button>
                                    </div>



                                    <h6>Can’t access? <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                            style="text-decoration: auto;">Forget password</a></h6>

                                    <h6 class="mt-5 mb-3" style="text-align: end;">I don't have an Acount <a href="./signup.php"
                                            style="text-decoration: auto;">Sign up</a> </h6>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- model start -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-2" id="exampleModalLabel2">

                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="resetPasswordProcess.php" method="post">
                        <h4 class="text-center">Forgot Password</h4>

                        <div>
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="Enter your Email" required style="background-color: #F4F4F4">
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="my-account-btn">
                                <button type="submit" class="default-btn ">Reset
                                    Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- End My Account Area -->


    <script>
    function togglePasswordVisibility() {
        const password = document.getElementById('password');
        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    }
    </script>