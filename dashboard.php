<?php
// Database connection
include('config.php');

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

// Fetch subcategories for CategoryId = 14
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

// Group categories and subcategories for CategoryId = 14
$categories_14 = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $categories_14[$row2['CategoryName']][] = [
        'SubCategoryId' => $row2['SubCategoryId'],
        'Subcategory' => $row2['Subcategory']
    ];
}
?>



<?php
session_start();


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
?>

<?php 

// Fetch payment details for the logged-in user
$payment_query = "SELECT 
    p.id, 
    p.policy_id, 
    posts.PostTitle, 
    posts.PostImage, 
    p.price, 
    p.transaction_id, 
    p.order_id, 
    p.payment_status, 
    p.created_at, 
    p.user_id, 
    p.user_name 
FROM 
    payments p
LEFT JOIN 
    tblposts posts 
ON 
    p.policy_id = posts.id
 
                  WHERE user_id = '$user_id' 
                  ORDER BY created_at DESC"; // Latest payments first
$payment_result = mysqli_query($conn, $payment_query);

?>

<?php include "header.php"; ?>
<!-- Start Dashboard Area -->


<div class="author-page-area pt-100 pb-100">
    <div class="container">





        <div class="portfolio-details-area pt-100 pb-70">
            <div class="container">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-4 col-md-6">
                        <!-- Profile Card -->
                        <div class="single-blog-card blog-card-three">
                            <div class="blog-img">
                                <!-- Display the profile picture -->
                                <a href="edit-profile.php">
                                    <img style="width:100%" src="<?php echo $user['profile_picture']; ?>"
                                        alt="Profile Picture" class="profile-img">
                                </a>
                            </div>
                            <div class="date">
                                <span><?php echo date("F j, Y", strtotime($user['created_at'])); ?></span>
                            </div>
                            <div class="single-blog-content">
                                <ul class="p-0 m-0">
                                    <li class="list-inline">
                                        <div class="admin">
                                            <i class="bx bx-user"></i>
                                        </div>
                                        <a href="edit-profile.php?user=<?php echo urlencode($user['name']); ?>">Edit Profile</a>

                                    </li>
                                    <li class="list-inline">
                                        <div class="admin">
                                            <i class="bx bx-lock-alt"></i>
                                        </div>
                                        <a href="change-password.php?user=<?php echo urlencode($user['name']); ?>">Change Password</a>
                                    </li>

                                </ul>
                                <h3 style="text-transform: capitalize;;text-align: center; font-weight:bold;">
                                    <?php echo $user['name']; ?></h3>
                                <h3 style="text-align: center; "><i class="bx bx-envelope"></i>
                                <a
                                        href="mail:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></h3>
                                <h3 style="text-align: center; "> <i class="bx bx-phone"></i>
                                <a
                                        href="tel:<?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <h2>Your Policies</h2>

                        <?php if (mysqli_num_rows($payment_result) > 0): ?>
                        <?php while ($payment = mysqli_fetch_assoc($payment_result)): ?>
                        <div class="portfolio-details-card">
                            <div class="single-portfolio-card2 d-flex align-items-center">
                                <div class="services-icon">
                                    <img src="./swamitra-admin/postimages/<?php echo htmlspecialchars($payment['PostImage']); ?>" alt="couple">
                                </div>
                                &nbsp;&nbsp;&nbsp;<h3><?php echo htmlspecialchars($payment['PostTitle']); ?></h3>
                            </div>

                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                               
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span> Transaction ID:</span>
                                <p><?php echo htmlspecialchars($payment['transaction_id']); ?></p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Price:</span>
                                <p>₹<?php echo number_format($payment['price'], 2); ?></p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Created At:</span>
                                <p><?php echo date("d M Y", strtotime($payment['created_at'])); ?></p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Payment Status:</span>
                                <p><?php echo htmlspecialchars($payment['payment_status']); ?></p>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <p>No payment records found.</p>
                        <?php endif; ?>
                    </div>



                </div>

            </div>
        </div>
    </div>

</div>

<!-- End Dashboard Area -->

<?php include "footer.php"; ?>