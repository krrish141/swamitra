<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    
    // Check if the form is submitted
    if(isset($_POST['update'])) {
        // Establish database connection (assuming it's already established elsewhere in your code)
        // $con = mysqli_connect("localhost", "username", "password", "database_name");
    
        // Get form data
        $employee_name = $_POST['employee_name'];
        $designation = $_POST['designation'];
        $postedby = $_SESSION['login'];
    
        // Check if a new image is uploaded
        if($_FILES["postimage"]["size"] > 0) {
            $image_name = $_FILES["postimage"]["name"];
    
            // Move uploaded image to a directory
            $target_directory = "postimages/";
            $target_file = $target_directory . basename($image_name);
            move_uploaded_file($_FILES["postimage"]["tmp_name"], $target_file);
            
            $id = intval($_GET['empid']);
            $query = "UPDATE tblemp SET Empname = '$employee_name', Empdesignation = '$designation', PostImage = '$image_name' WHERE id = '$id'";
        } else {
             $id = intval($_GET['empid']);
            $query = "UPDATE tblemp SET Empname = '$employee_name', Empdesignation = '$designation' WHERE id = '$id'";
        }
    
        // Execute the update query
        if(mysqli_query($con, $query)) {
            $msg = "Data updated successfully.";
        } else {
            $msg ="Error updating data: " . mysqli_error($con);
        }
    }
    ?>
    




<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Swamitra |Edit Subadmin</title>

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

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

<!-- Top Bar Start -->
 <?php include('includes/topheader.php');?>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->
 <div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Subadmin</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li>
                                <a href="#">Subadmin </a>
                            </li>
                            <li class="active">
                                Edit Subadmin
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Edit Team members</b></h4>
                        <hr />

                        <div class="row">
                            <div class="col-sm-6">  
                                <!---Success Message--->  
                                <?php if($msg){ ?>
                                <div class="alert alert-success" role="alert">
                                    <strong></strong> <?php echo htmlentities($msg);?>
                                </div>
                                <?php } ?>
                                <!---Error Message--->
                                <?php if($error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($error);?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php 
                        $id=intval($_GET['empid']);
                        $query=mysqli_query($con,"Select * from  tblemp where id='$id'");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <form name="addpost" method="post" enctype="multipart/form-data">
                                    <div class="form-group m-b-20">
                                        <label for="exampleInputEmail1">Employee Name</label>
                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['Empname']);?>"  id="posttitle" name="employee_name" required>
                                    </div>
                                    <div class="form-group m-b-20">
                                        <label for="exampleInputEmail1">Designation</label>
                                        <input type="text" class="form-control" value="<?php echo htmlentities($row['Empdesignation']);?>" id="posttitle" name="designation"  required>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                                                <td><img src="postimages/<?php echo htmlentities($row['PostImage']);?>" alt="Image" width="100" height="100"></td>
                                                <br />
                                                <!-- <a href="gallery-change-image.php?imageid=<?php echo htmlentities($row['id']);?>">Update Image</a> -->
                                                <!-- New input field for uploading a new image -->
                                                <input type="file" class="form-control" id="postimage" name="postimage">
                                            </div>
                                        </div>
                                    </div>                        				
                                    <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
                                </form>                     			
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php');?>
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