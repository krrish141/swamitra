<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    
if(isset($_POST['update'])) {
    // Include your database connection file
    

    // Get form data
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $job_description = $_POST['postdescription'];
    $postedby = $_SESSION['login'];

    // Get the ID of the post to be updated
    

    // Check if a new image is uploaded
    if($_FILES["postimage"]["name"] != ''){
        // Get the name of the new uploaded image
        $image_name = $_FILES["postimage"]["name"];

        // Move uploaded image to a directory
        $target_directory = "postimages/";
        $target_file = $target_directory . basename($image_name);
        move_uploaded_file($_FILES["postimage"]["tmp_name"], $target_file);
        $id = intval($_GET['cid']);
        // Update the image in the database
        $query = "UPDATE tblcareer SET designation='$designation', Qualification='$qualification', Experience='$experience', PostDetails='$job_description', PostImage='$image_name', postedBy='$postedby' WHERE id = $id";
        echo $query;
    } else {
        $id = intval($_GET['cid']);
        // If no new image is uploaded, update other fields without changing the image
        $query = "UPDATE tblcareer SET designation='$designation', Qualification='$qualification', Experience='$experience', PostDetails='$job_description', postedBy='$postedby' WHERE id = $id";
    }

    // Execute the query
    if(mysqli_query($con, $query)) {
        $msg = "Data updated successfully.";
    } else {
        $msg = "Error updating data: " . mysqli_error($con);
    }

    // Close connection
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Newsportal |Edit Subadmin</title>

        <!-- App css -->
      <!-- Summernote css -->
    <link href="plugins/summernote/summernote.css" rel="stylesheet" />

<!-- Select2 -->
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- Jquery filer css -->
        <link href="plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
            <link href="plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">
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
                                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
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
                        $id=intval($_GET['cid']);
                        $query=mysqli_query($con,"Select * from  tblcareer where id='$id'");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <form name="addpost" method="post" enctype="multipart/form-data">
                                <div class="form-group m-b-20">
                                      <label for="exampleInputEmail1">Designation</label>
                                       <input type="text" class="form-control" value="<?php echo htmlentities($row['designation']);?>" id="posttitle" name="designation" required>
                                 </div>
                                 <div class="form-group m-b-20">
                                   <label for="exampleInputEmail1">Qualification</label>
                                   <input type="text" class="form-control"  value="<?php echo htmlentities($row['Qualification']);?>" id="posttitle" name="qualification" required>
                                      </div>
                                      <div class="form-group m-b-20">
                                           <label for="exampleInputEmail1">Experience</label>
                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['Experience']);?>"  id="posttitle" name="experience"  required>
                                      </div>
                                      
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Job description</b></h4>
                                                    <textarea class="summernote" name="postdescription" required><?php echo htmlentities($row['PostDetails']);?></textarea>                                             </div>
                                         </div>
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

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
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
<?php } ?>