<?php
// Include your database configuration file
include('./includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected Category ID from the AJAX request
    $categoryId = intval($_POST['categoryId']);

    // Check if Category ID is valid
    if ($categoryId > 0) {
        // Fetch subcategories where CategoryId matches and Is_Active is 1
        $query = mysqli_query($con, "SELECT SubCategoryId, Subcategory FROM tblsubcategory WHERE CategoryId=$categoryId AND Is_Active=1");

        // Check if any subcategories exist
        if (mysqli_num_rows($query) > 0) {
            echo '<option value="">Select Subcategory</option>'; // Default placeholder
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<option value="' . htmlentities($row['SubCategoryId']) . '">' . htmlentities($row['Subcategory']) . '</option>';
            }
        } else {
            // No subcategories found for the given category
            echo '<option value="">No Subcategory Found</option>';
        }
    } else {
        // Invalid Category ID
        echo '<option value="">Invalid Category</option>';
    }
}
?>
