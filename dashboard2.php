<?php
session_start();
include('config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch the user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}

// Fetch categories and their subcategories for specific CategoryId values (10, 11, 12)
$query1 = "
    SELECT 
        c.id AS CategoryId, 
        c.CategoryName, 
        s.SubCategoryId, 
        s.Subcategory 
    FROM 
        tblcategory c
    LEFT JOIN 
        tblsubcategory s 
    ON 
        c.id = s.CategoryId
    WHERE 
        c.Is_Active = 1 AND c.id IN (10, 11, 12) AND (s.Is_Active = 1 OR s.Is_Active IS NULL)
    ORDER BY 
        c.CategoryName, s.Subcategory";
$result1 = mysqli_query($conn, $query1);

// Group categories and subcategories for CategoryIds 10, 11, 12
$categories_10_11_12 = [];
while ($row1 = mysqli_fetch_assoc($result1)) {
    $categories_10_11_12[$row1['CategoryName']][] = [
        'SubCategoryId' => $row1['SubCategoryId'],
        'Subcategory' => $row1['Subcategory']
    ];
}

// Fetch subcategories for CategoryId = 13
$query2 = "
    SELECT 
        c.id AS CategoryId, 
        c.CategoryName, 
        s.SubCategoryId, 
        s.Subcategory
    FROM 
        tblcategory c
    LEFT JOIN 
        tblsubcategory s 
    ON 
        c.id = s.CategoryId
    WHERE 
        c.Is_Active = 1 AND c.id = 13 AND (s.Is_Active = 1 OR s.Is_Active IS NULL)
    ORDER BY 
        c.CategoryName, s.Subcategory";
$result2 = mysqli_query($conn, $query2);

// Group categories and subcategories for CategoryId = 13
$categories_13 = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $categories_13[$row2['CategoryName']][] = [
        'SubCategoryId' => $row2['SubCategoryId'],
        'Subcategory' => $row2['Subcategory']
    ];
}

// Fetch payment details for the logged-in user
$payment_query = "SELECT id, policy_id, price, transaction_id, order_id, payment_status, created_at, user_id, user_name 
                  FROM payments 
                  WHERE user_id = '$user_id' 
                  ORDER BY created_at DESC"; // Latest payments first
$payment_result = mysqli_query($conn, $payment_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category & Payment Info</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>


    <!-- Display Payment History -->
    <div class="section">
        <h3>Your Payment History</h3>

        <table>
            <thead>
                <tr>
                    <th>Policy ID</th>
                    <th>Price</th>
                    <th>Transaction ID</th>
                    <th>Order ID</th>
                    <th>Payment Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($payment_result) > 0): ?>
                    <?php while ($payment = mysqli_fetch_assoc($payment_result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($payment['policy_id']); ?></td>
                            <td><?php echo htmlspecialchars($payment['price']); ?></td>
                            <td><?php echo htmlspecialchars($payment['transaction_id']); ?></td>
                            <td><?php echo htmlspecialchars($payment['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($payment['payment_status']); ?></td>
                            <td><?php echo htmlspecialchars($payment['created_at']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No payment records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
