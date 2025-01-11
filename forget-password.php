<?php
include "./config.php"; // Database connection

session_start();

// Check if the user is already logged in, if yes, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Initialize message variable
$msg = "";

// Handle the form submission for password reset
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($password) || empty($confirm_password)) {
        $msg = "<div class='alert alert-danger'>All fields are required.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "<div class='alert alert-danger'>Invalid email format.</div>";
    } elseif ($password !== $confirm_password) {
        $msg = "<div class='alert alert-danger'>Passwords do not match.</div>";
    } elseif (strlen($password) < 8) {
        $msg = "<div class='alert alert-danger'>Password must be at least 8 characters long.</div>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update the password
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $update_stmt->bind_param("ss", $hashed_password, $email);

            if ($update_stmt->execute()) {
                $msg = "<div class='alert alert-success'>Password reset successful! You can now <a href='login.php'>log in</a>.</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Failed to update password. Please try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email address not found in our records.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | SWAMI MITRA INSURANCE</title>
    <link rel="icon" type="image/png" href="assets/images/headerlogo-removebg-preview.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .reset-container {
            max-width: 500px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .reset-container img {
            display: block;
            margin: 0 auto 20px;
            height: 100px;
        }

        .reset-container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .alert {
            margin-bottom: 20px;
        }

        .form-check-input {
            margin-top: 6px;
        }
    </style>
</head>

<body>

    <div class="reset-container">
        <img src="./assets/images/headerlogo-removebg-preview.png" alt="SWAMI MITRA INSURANCE Logo">
        <h3>Reset Your Password</h3>
        <?php if (!empty($msg)) echo $msg; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="hidden" name="reset_password" value="1">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePasswordVisibility()">
                <label class="form-check-label" for="showPassword">Show Password</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            if (password.type === 'password') {
                password.type = 'text';
                confirmPassword.type = 'text';
            } else {
                password.type = 'password';
                confirmPassword.type = 'password';
            }
        }
    </script>

</body>

</html>
