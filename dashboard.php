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

<?php include "header.php"; ?>
<!-- Start Dashboard Area -->


<div class="author-page-area pt-100 pb-100">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6">
                <!-- Profile Card -->
                <div class="single-blog-card blog-card-three">
                    <div class="blog-img">
                        <!-- Display the profile picture -->
                        <a href="edit-profile.php">
                            <img style="width:100%" src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture"
                                class="profile-img">
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
                                <a href="edit-profile.php">Edit Profile</a>
                            </li>
                            <li class="list-inline">
                                <div class="admin">
                                    <i class="bx bx-lock-alt"></i>
                                </div>
                                <a href="change-password.php">Change Password</a>
                            </li>

                        </ul>
                        <h3 style="text-transform: capitalize;;text-align: center; font-weight:bold;">
                            <?php echo $user['name']; ?></h3>
                        <h3 style="text-align: center; "> <a
                                href="mail:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></h3>
                    </div>
                </div>
            </div>
        </div>

        <a href="./logout.php">
        <button>Logout</button></a>

        <!-- <div class="portfolio-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-portfolio-details-content">
                            <div class="portfolio-img">
                                <img src="assets/images/portfolio/portfolio-details-img-1.webp" alt="portfolio">
                            </div>
                            <h3>About The Services</h3>
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-md-4">
                                    <div class="single-portfolio-card2 d-flex align-items-center">
                                        <div class="services-icon">
                                            <img src="assets/images/services/couple.svg" alt="couple">
                                        </div>
                                        <h3>Life Insurance</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-4">
                                    <div class="single-portfolio-card2 d-flex align-items-center">
                                        <div class="services-icon">
                                            <img src="assets/images/services/heart.svg" alt="heart">
                                        </div>
                                        <h3>Health Insurance</h3>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-4">
                                    <div class="single-portfolio-card2 d-flex align-items-center">
                                        <div class="services-icon">
                                            <img src="assets/images/services/home.svg" alt="home">
                                        </div>
                                        <h3>Home Insurance</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-details-card">
                            <h2>Portfolio Details</h2>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Client :</span>
                                <p>John Duo</p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Category :</span>
                                <p>Insurance</p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Date :</span>
                                <p>27 - 09 - 2024</p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Year :</span>
                                <p>2024</p>
                            </div>
                            <div class="portfolio-client d-flex align-items-center justify-content-between">
                                <span>Location :</span>
                                <p>Event HQ 24 Fifth st, USA</p>
                            </div>
                        </div>
                        <div class="help-contact-card">
                            <div class="help-img">
                                <img src="assets/images/portfolio/portfolio-details-img-4.webp" alt="portfolio">
                            </div>
                            <h3>How Can We Help</h3>
                            <p>Cicero are also reproduced in theirm accompanied by English versions from the
                                translation.</p>
                            <div class="call-experts">
                                <div class="phone-call">
                                    <img src="assets/images/phone-call.svg" alt="phone-call">
                                </div>
                                <span>Call To Our Experts</span>
                                <a href="tel:(+0188)76898708">(+0188) 768 98708</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
    </div>

    <!-- End Dashboard Area -->

    <?php include "footer.php"; ?>