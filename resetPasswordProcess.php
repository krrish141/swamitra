

<?php
require_once './config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendPasswordResetEmail($email, $verification_code)
{
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vishwakarmakrishna186@gmail.com'; // Your Gmail username
        $mail->Password   = 'fqggwdplrkptkogk'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Sender and recipient
        $mail->setFrom('vishwakarmakrishna186@gmail.com', 'YourCompany Insurance');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Your Password';
        $mail->Body = "
            <img src='./assets/images/headerlogo-removebg-preview.png' width='200'>
            <p>Dear User,</p>
            <p>We received a request to reset your password. Click the button below to proceed:</p>
            <a href='https://pacificmanning.co.in/swamitra-ins4/forget-password.php' 
            style='padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;'>
            Forget Password
            </a>
            <p>If you didn’t request this, you can safely ignore this email.</p>
            <p>Best regards, <br>Swamitra Gen Life Healtth Insurance Pvt. Ltd</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $verification_code = bin2hex(random_bytes(16)); // Unique code
            $result = sendPasswordResetEmail($email, $verification_code);
            if ($result === true) {
                header("Location: ./login.php?success=2");
                exit();
            } else {
                echo "Error sending email: " . $result;
            }
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "Email is required.";
    }
}
?>

