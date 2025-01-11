
<?php 
session_start();
include('includes/config.php');
error_reporting(0);

// Check if user is logged in
if (strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
} else {
    // For adding post
    if (isset($_POST['submit'])) {
        $posttitle = $_POST['posttitle'];
        $catid = $_POST['category'];
        $subcatid = $_POST['subcategory'];
        $postdetails = $_POST['postdescription'];
        $price = $_POST['price'];
        $coveramount = $_POST['coveramount'];
        $postedby = $_SESSION['login'];

        // Create URL slug
        $arr = explode(" ", $posttitle);
        $url = implode("-", $arr);

        // Handle image upload
        $imgfile = $_FILES["postimage"]["name"];
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        // Validate image extension
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg / png / gif format allowed');</script>";
        } else {
            // Rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Move the image to the directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

            $status = 1;

            // SQL query to insert data
            $query = mysqli_prepare($con, "INSERT INTO tblposts 
                (PostTitle, CategoryId, SubCategoryId, Coveramount, PostDetails, Price, PostUrl, Is_Active, PostImage, postedBy) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($query) {
                // Bind parameters
                mysqli_stmt_bind_param($query, "siissssiss", 
                    $posttitle, $catid, $subcatid, $coveramount, $postdetails, $price, $url, $status, $imgnewfile, $postedby);

                // Execute query
                if (mysqli_stmt_execute($query)) {
                    $msg = "Post successfully added";
                } else {
                    $error = "Something went wrong: " . mysqli_error($con);
                }
                mysqli_stmt_close($query); // Close prepared statement
            } else {
                $error = "Prepare statement failed: " . mysqli_error($con);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>Swamitra | Add Post</title>

    <!-- Summernote css -->
    <link href="plugins/summernote/summernote.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
    <script>
    function getSubCat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcategory.php",
            data: 'catid=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }
    </script>
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php');?>
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
                                <h4 class="page-title">Add Policy </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Add Policy </a>
                                    </li>
                                    <li class="active">
                                        Add Policy
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <!---Success Message--->
                            <?php if($msg){ ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlentities($msg);?>
                            </div>
                            <?php } ?>

                            <!---Error Message--->
                            <?php if($error){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlentities($error);?></div>
                            <?php } ?>


                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <div class="">
                                    <form name="addpost" method="post" enctype="multipart/form-data">
                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Post Title</label>
                                            <input type="text" class="form-control" id="posttitle" name="posttitle"
                                                placeholder="Enter title" required>
                                        </div>



                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Policy</label>
                                            <select class="form-control" name="category" id="category"
                                                onChange="getSubCat(this.value);" required>
                                                <option value="">Select Category </option>
                                                <?php
                                                    // Feching active categories
                                                    $ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
                                                    while($result=mysqli_fetch_array($ret))
                                                    {    
                                                    ?>
                                                <option value="<?php echo htmlentities($result['id']);?>">
                                                    <?php echo htmlentities($result['CategoryName']);?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Policy Sub Category</label>
                                            <select class="form-control" name="subcategory" id="subcategory" required>

                                            </select>
                                        </div>


                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="Enter Amount" required>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <label for="exampleInputEmail1">Cover Amount</label>
                                            <input type="text" class="form-control" id="coveramount" name="coveramount"
                                                placeholder="Enter Cover Amount" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                                                    <textarea class="summernote" name="postdescription"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage" required>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="submit"
                                            class="btn btn-success waves-effect waves-light">Save and Post</button>
                                        <button type="button"
                                            class="btn btn-danger waves-effect waves-light">Discard</button>
                                    </form>
                                </div>
                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->



                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php');?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    <script>
    function getSubCat(categoryId) {
        if (categoryId) {
            // Making an AJAX request to fetch subcategories
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "get_subcategory.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('subcategory').innerHTML = xhr.responseText;
                }
            };
            xhr.send("categoryId=" + categoryId);
        } else {
            document.getElementById('subcategory').innerHTML = "<option value=''>Select Subcategory</option>";
        }
    }
</script>


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
    <script src="plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
    </script>
    <script src="plugins/switchery/switchery.min.js"></script>

    <!--Summernote js-->
    <script src="plugins/summernote/summernote.min.js"></script>




</body>

</html>
