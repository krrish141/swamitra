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
<?php
include "home.php";
?>
<?php
include "footer.php";
?>