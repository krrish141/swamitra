<?php

// Include the database configuration
include("./config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $userId = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $userName = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $policyId = filter_input(INPUT_POST, 'policy_id', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Validate required fields
    if (empty($userId) || empty($userName) || empty($policyId) || empty($price)) {
        die("Invalid input provided. All fields are required.");
    }

    // Generate transaction and order IDs
    $orderId = uniqid('ORDER_');
    $transactionId = uniqid('TXN_');

    // Insert payment details into the database
    $stmt = $conn->prepare(
        "INSERT INTO payments (user_id, user_name, policy_id, price, transaction_id, order_id, payment_status) 
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $paymentStatus = 'PENDING'; // Initial payment status
    if (!$stmt) {
        die("Failed to prepare the database statement. Error: " . $conn->error);
    }
    $stmt->bind_param('issdsss', $userId, $userName, $policyId, $price, $transactionId, $orderId, $paymentStatus);

    if (!$stmt->execute()) {
        die("Failed to save payment details in the database. Error: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();

    // PhonePe API configuration
    $merchantId = 'PGTESTPAYUAT'; // Replace with your Merchant ID
    $apiKey = "099eb0cd-02cf-4e2a-8aca-3e6c6aff0399"; // Replace with your API key
    $redirectUrl = 'payment-success.php'; // Redirect URL after payment success
    $name = "Tutorials Website"; // Your business or short name
    $description = 'Payment for Policy ID ' . htmlspecialchars($policyId); // Payment description
    $amountInPaise = intval($price * 100); // Convert amount to paise (integer)

    // Prepare payment request data
    $paymentData = [
        'merchantId' => $merchantId,
        'merchantTransactionId' => $transactionId,
        'merchantUserId' => 'MUID123',
        'amount' => $amountInPaise,
        'redirectUrl' => $redirectUrl,
        'redirectMode' => "POST",
        'callbackUrl' => $redirectUrl,
        'merchantOrderId' => $orderId,
        'mobileNumber' => '9999999999', // Replace with the user's mobile number
        'message' => $description,
        'shortName' => $name,
        'paymentInstrument' => [
            'type' => 'PAY_PAGE'
        ]
    ];

    // Encode and prepare API request
    $jsonEncode = json_encode($paymentData);
    $payloadMain = base64_encode($jsonEncode);
    $saltIndex = 1;
    $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    $sha256 = hash("sha256", $payload);
    $finalXHeader = $sha256 . '###' . $saltIndex;
    $request = json_encode(['request' => $payloadMain]);

    // cURL request to PhonePe API
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-VERIFY: " . $finalXHeader,
            "Accept: application/json"
        ]
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        die("cURL Error: " . htmlspecialchars($err));
    }

    $res = json_decode($response);

    // Handle PhonePe API response
    if (isset($res->success) && $res->success === true) {
        $payUrl = $res->data->instrumentResponse->redirectInfo->url;

        // Redirect the user to the payment URL
        header('Location: ' . $payUrl);
        exit;
    } else {
        $errorMsg = isset($res->message) ? $res->message : 'Payment initiation failed.';
        die("Error: " . htmlspecialchars($errorMsg));
    }
} else {
    die("Invalid request method.");
}

// Close the database connection
$conn->close();
?>
