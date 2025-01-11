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

// If the user is logged in, fetch the user data from the database
$user = null;
if (isset($_SESSION['user_id'])) {
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
}
// If not logged in, $user remains null, allowing visitors to access the site
?>

<?php
include "header.php";
?>
<div class="page-banner-area">
    <div class="container">
        <div class="single-page-banner-content">
            <h3>About Us</h3>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>


<div class="about-style-2-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single-about-2-content">
                    <div class="section-title left-title">
                        <span class="top-title">About Us</span>
                        <h2 style="font-size:30px;">Protecting What Matters with Innovative Solutions</h2>
                        <p>At Swamitra Insurance, we are committed to providing innovative and reliable insurance
                            solutions that protect what matters most to you. With years of experience in the industry,
                            we offer a wide range of insurance products, including life, health, vehicle, and property
                            insurance, tailored to meet your unique needs.
                        </p>
                        <p>At Swamitra Insurance, we are committed to providing innovative and reliable insurance
                            solutions that protect what matters most to you. With years of experience in the industry,
                            we offer a wide range of insurance products, including life, health, vehicle, and property
                            insurance, tailored to meet your unique needs.
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <div class="best-support-card">
                                <img src="assets/images/about/customer-service.svg" alt="customer">
                                <h3 style="color: black;">Best Support</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <div class="best-support-card card2">
                                <img src="assets/images/about/agent.svg" alt="agent">
                                <h3 style="color: black;">Expert Agent</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4">
                            <div class="best-support-card">
                                <img src="assets/images/about/world.svg" alt="world">
                                <h3 style="color: black;">Best In World</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="about2-img">
                    <div class="about2-main">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="img-style1">
                                    <img src="assets/images/about/about-2-img-1.webp" alt="about">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="img-style2">
                                    <img src="assets/images/about/about-2-img-2.webp" alt="about">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about2-img1">
                        <img src="assets/images/about/about-2-img-3.webp" alt="about">
                    </div>
                    <div class="about2-main-img11">
                        <img src="assets/images/about/about-2-main-img.webp" alt="about">
                    </div>
                    <div class="about2-odometer-card">
                        <div class="about2-odometer">
                            <h2>
                                <span class="odometer" data-count="30">00</span>
                            </h2>
                            <p>Years Experience </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-two-shape">
        <img src="assets/images/about/about-2-shape.webp" alt="image">
    </div>
</div>
<hr>

<div class="services-two-area pt-100 pb-100">
    <div class="container">
        <div class="section-title">
            <span class="top-title">Our Services</span>
            <h2>Our Best Insurance Services</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="services-img">
                    <img src="assets/images/services/services-1.webp" alt="services">
                </div>
                <div class="services-img-1">
                    <img src="assets/images/services/services-2.webp" alt="services">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-services-two-content">
                    <div class="services-btn">
                        <a href="#" class="default-btn btn-style-2">View All</a>
                    </div>
                    <div class="services-shape3">
                        <img src="assets/images/services/services-border-shape.webp" alt="shape">
                    </div>
                    <div class="services-card-two d-flex align-items-center">
                        <div class="services-icon">
                            <img src="assets/images/services/services-2-icon-1.svg" alt="icon1">
                        </div>
                        <h3><a href="#">Home Insurance</a></h3>
                    </div>
                    <div class="services-card-two card2 d-flex align-items-center">
                        <div class="services-icon">
                            <img src="assets/images/services/services-2-icon-2.svg" alt="icon1">
                        </div>
                        <h3><a href="#">Car Insurance</a></h3>
                    </div>
                    <div class="services-card-two card3 d-flex align-items-center">
                        <div class="services-icon">
                            <img src="assets/images/services/services-2-icon-3.svg" alt="icon1">
                        </div>
                        <h3><a href="#">Health Insurance</a></h3>
                    </div>
                    <div class="services-card-two card4 d-flex align-items-center">
                        <div class="services-icon">
                            <img src="assets/images/services/services-2-icon-4.svg" alt="icon1">
                        </div>
                        <h3><a href="#">Travel Insurance</a></h3>
                    </div>
                    <div class="services-card-two card5 d-flex align-items-center">
                        <div class="services-icon">
                            <img src="assets/images/services/services-2-icon-5.svg" alt="icon1">
                        </div>
                        <h3><a href="#">Business Insurance</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>