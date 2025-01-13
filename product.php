

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

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit(); // Ensure no further code is executed
}

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
// Get the subcategory ID from the URL (if it exists)
$subcategoryId = isset($_GET['subcategory']) ? (int)$_GET['subcategory'] : 0; // Default to 0 if not set

// Fetch data from the tblposts table with a condition for SubCategoryId
$query = "
    SELECT 
        id, 
        PostTitle, 
        CategoryId, 
        SubCategoryId, 
        Price, 
        Coveramount, 
        PostDetails, 
        PostImage, 
        Is_Active 
    FROM 
        tblposts 
    WHERE 
        Is_Active = 1" . ($subcategoryId > 0 ? " AND SubCategoryId = $subcategoryId" : "") . "
    ORDER BY PostingDate DESC";

$result = mysqli_query($conn, $query);

// Store posts in an array
$posts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}
?>

<?php if (empty($posts)): ?>
<!-- No posts available message -->
<div style="padding:50px">
    <h5 style="font-size:25px;font-weight: bold;">The requested policy is currently unavailable. Please check back later.</h5>
</div>
<?php else: ?>
<?php foreach ($posts as $post): ?>
<!-- Plan Card -->
<div class="plan-card">
    <div class="plan-header">
        <div class="logo-section">
            <img src="./swamitra-admin/postimages/<?php echo htmlspecialchars($post['PostImage']); ?>"
                alt="<?php echo htmlspecialchars($post['PostTitle']); ?>">
        </div>
        <div class="plan-info">
        <h2 style="font-size: 30px; font-weight: 700; text-shadow: 2px 2px 4px rgb(0 0 0 / 35%);">
    <?php echo htmlspecialchars($post['PostTitle']); ?>
</h2>

            <ul  class="plan-features mt-4 mb-3">
    <?php
    // Load the HTML content
    $htmlContent = $post['PostDetails'];
    
    // Remove any extra tags except <li> and <ul>
    preg_match_all('/<li.*?>(.*?)<\/li>/is', $htmlContent, $matches);
    
    // Loop through the <li> items and display them
    foreach ($matches[1] as $liContent) {
        // Clean up the content (remove unwanted spaces or HTML entities)
        $cleanLiContent = htmlspecialchars(strip_tags(str_replace('&nbsp;', '', $liContent)));
    
        echo "<li><span class='checkmark'></span>$cleanLiContent</li>";
    }
    ?>
</ul>





        </div>
    </div>
    <div class="plan-pricing">
    <div class="cover-amount">
        <p style="font-size: 15px; color: black; font-weight: 500;">Cover amount</p>
        <span style="font-size: 25px;">₹<?php echo htmlspecialchars(number_format($post['Coveramount'])); ?></span>
    </div>

    <div class="price-button" style="cursor: pointer;">
        <form method="POST" action="payment.php" style="display: inline;">

            <input type="text" name="policy_id" value="<?php echo $post['id']; ?>">
            <input type="text" name="price" value="<?php echo $post['Price']; ?>">
            <input type="text" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
            <input type="text" name="user_name" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>">
            

            <button type="submit" style="color: white; text-decoration: none; background: none; border: none; cursor: pointer;">
                <span class="price">₹<?php echo htmlspecialchars(number_format($post['Price'])); ?>/month</span>
            </button>
        </form>
    </div>
</div>

</div>
<?php endforeach; ?>
<?php endif; ?>





<script>
function openPopup() {
    document.getElementById("popupForm").style.display = "block";
}

function closePopup() {
    document.getElementById("popupForm").style.display = "none";
}
</script>

<?php
include "footer.php";
?>