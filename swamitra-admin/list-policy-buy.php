<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if ($_GET['action'] == 'del' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        $query = mysqli_query($con, "update  payments set Is_Active='0' where SubCategoryId='$id'");
        $msg = "Category deleted ";
    }
    // Code for restore
    if ($_GET['resid']) {
        $id = intval($_GET['resid']);
        $query = mysqli_query($con, "update  payments set Is_Active='1' where SubCategoryId='$id'");
        $msg = "Category restored successfully";
    }

    // Code for Forever deletionparmdel
    if ($_GET['action'] == 'perdel' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        $query = mysqli_query($con, "delete from   payments  where SubCategoryId='$id'");
        $delmsg = "Category deleted forever";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title> Swamitra</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manage SubCategories</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">SubCategory </a>
                                        </li>
                                        <li class="active">
                                            Manage SubCategories
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">

                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo htmlentities($delmsg); ?></div>
                                <?php } ?>


                            </div>








                            <?php
// Set the number of records per page
$records_per_page = 20;

// Get the current page number from the URL, default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Get the search query
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : "";

// Calculate the offset for SQL query
$offset = ($page - 1) * $records_per_page;

// Query to count total records with search filter
$search_query = $search ? "WHERE p.user_name LIKE '%$search%' OR t.PostTitle LIKE '%$search%' OR p.transaction_id LIKE '%$search%' OR p.payment_status LIKE '%$search%'" : "";

$total_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM payments p JOIN tblposts t ON p.policy_id = t.id $search_query");
$total_row = mysqli_fetch_assoc($total_query);
$total_records = $total_row['total'];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

// Query to fetch filtered records
$query = mysqli_query($con, "SELECT p.*, t.PostTitle AS policy_name  
 FROM payments p  
 JOIN tblposts t ON p.policy_id = t.id  
 $search_query  
 ORDER BY p.id DESC 
 LIMIT $offset, $records_per_page");

$cnt = $offset + 1;
?>

<div class="row">
    <div class="col-md-12">
        <div class="demo-box m-t-20">
           

            <!-- Search Form -->
            <form method="GET" action="">
                <input type="text" name="search" value="<?php echo htmlentities($search); ?>" placeholder="Search Users" class="form-control" style="width: 300px; display: inline-block; margin-bottom: 10px;">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="./list-policy-buy.php" class="btn btn-secondary">Reset</a>
            </form>

            <div class="table-responsive">
                <table class="table m-0 table-colored-bordered table-bordered-primary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Policy Name</th>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                            <th>Posting Date</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query) == 0) {
                            echo '<tr><td colspan="7" align="center"><h3 style="color:red">No record found</h3></td></tr>';
                        } else {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                    <td><?php echo htmlentities($row['policy_name']); ?></td>
                                    <td><?php echo htmlentities($row['user_name']); ?></td>
                                    <td>₹<?php echo htmlentities($row['price']); ?></td>
                                    <td><?php echo htmlentities($row['transaction_id']); ?></td>
                                    <td><?php echo date("jS M Y", strtotime($row['created_at'])); ?></td>
                                    <td style="background-color: 
                            <?php echo ($row['payment_status'] == 'PENDING') ? 'orange' : (($row['payment_status'] == 'SUCCESS') ? 'green' : (($row['payment_status'] == 'CANCEL') ? 'red' : 'white')); ?>; 
                                     color: white; padding: 5px; text-align: center;">
                                        <?php echo htmlentities($row['payment_status']); ?>
                                    </td>
                                </tr>
                        <?php
                                $cnt++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination" style="margin-top: 20px; text-align: center;">
                <ul class="pagination">
                    <?php if ($page > 1) { ?>
                        <li><a href="?search=<?php echo htmlentities($search); ?>&page=1">First</a></li>
                        <li><a href="?search=<?php echo htmlentities($search); ?>&page=<?php echo $page - 1; ?>">&laquo; Prev</a></li>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a href="?search=<?php echo htmlentities($search); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>

                    <?php if ($page < $total_pages) { ?>
                        <li><a href="?search=<?php echo htmlentities($search); ?>&page=<?php echo $page + 1; ?>">Next &raquo;</a></li>
                        <li><a href="?search=<?php echo htmlentities($search); ?>&page=<?php echo $total_pages; ?>">Last</a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>
</div>

                            <style>
                                .pagination ul {
                                    list-style: none;
                                    padding: 0;
                                    display: inline-block;
                                }

                                .pagination ul li {
                                    display: inline;
                                    margin: 2px;
                                }

                                .pagination ul li a {
                                    text-decoration: none;
                                    padding: 8px 12px;
                                    background-color: #007bff;
                                    color: white;
                                    border-radius: 5px;
                                }

                                .pagination ul li.active a {
                                    background-color: #0056b3;
                                }

                                .pagination ul li a:hover {
                                    background-color: #0056b3;
                                }
                            </style>

                            <!--- end row -->




                        </div> <!-- container -->

                    </div> <!-- content -->
                    <?php include('includes/footer.php'); ?>
                </div>

            </div>
            <!-- END wrapper -->



            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="../plugins/switchery/switchery.min.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>