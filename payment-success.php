<?php
// Include the database configuration
include("./config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the incoming POST data
    $merchantTransactionId = filter_input(INPUT_POST, 'merchantTransactionId', FILTER_SANITIZE_STRING);
    $merchantOrderId = filter_input(INPUT_POST, 'merchantOrderId', FILTER_SANITIZE_STRING);
    $paymentStatus = filter_input(INPUT_POST, 'paymentStatus', FILTER_SANITIZE_STRING);
    $transactionAmount = filter_input(INPUT_POST, 'transactionAmount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $transactionDate = filter_input(INPUT_POST, 'transactionDate', FILTER_SANITIZE_STRING);
    $paymentMode = filter_input(INPUT_POST, 'paymentMode', FILTER_SANITIZE_STRING);
    
    // Validate required parameters
    if (!$merchantTransactionId || !$merchantOrderId || !$paymentStatus) {
        die("Invalid response from payment gateway.");
    }

    // Check the payment status and update the record accordingly
    if ($paymentStatus === 'SUCCESS') {
        $status = 'SUCCESS';
    } else {
        $status = 'FAILED';
    }

    // Update the payment status in the database
    $stmt = $conn->prepare(
        "UPDATE payments SET payment_status = ?, transaction_amount = ?, transaction_date = ?, payment_mode = ? 
         WHERE merchant_transaction_id = ? AND merchant_order_id = ?"
    );
    
    $stmt->bind_param('sdssss', $status, $transactionAmount, $transactionDate, $paymentMode, $merchantTransactionId, $merchantOrderId);

    if ($stmt->execute()) {
        // Success message
        echo "<h1>Payment Success</h1>";
        echo "<p>Your payment has been successfully processed.</p>";
        echo "<p>Transaction ID: " . htmlspecialchars($merchantTransactionId) . "</p>";
        echo "<p>Amount: ₹" . htmlspecialchars($transactionAmount) . "</p>";
        echo "<p>Payment Mode: " . htmlspecialchars($paymentMode) . "</p>";
        echo "<p>Transaction Date: " . htmlspecialchars($transactionDate) . "</p>";
        // Optionally, redirect to a thank-you or user dashboard page
        // header('Location: success-page.php');
    } else {
        echo "Failed to update payment status. Please try again later.";
    }

    // Close the statement
    $stmt->close();
} else {
    die("Invalid request method.");
}

// Close the database connection
$conn->close();
?>
