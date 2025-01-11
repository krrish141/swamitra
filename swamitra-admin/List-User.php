<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"update users set Is_Active='0' where id='$id'");
	$msg="User deleted Succefully ";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update users set Is_Active='1' where id='$id'");
	$msg="User restored successfully";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> | Manage Categories</title>
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
                                <h4 class="page-title">Manage User</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Admin</a>
                                    </li>

                                    <li class="active">
                                        Manage User
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-sm-6">

                            <?php if($msg){ ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlentities($msg);?>
                            </div>
                            <?php } ?>

                            <?php if($delmsg){ ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?>
                            </div>
                            <?php } ?>


                        </div>








                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">
                                        <a href="add-category.php">
                                            <button id="addToTable" class="btn btn-success waves-effect waves-light">Add
                                                <i class="mdi mdi-plus-circle-outline"></i></button>
                                        </a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Profile Pic</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
        $query = mysqli_query($con, "SELECT * FROM users WHERE Is_Active = 1");
        $cnt = 1;
        while ($row = mysqli_fetch_array($query)) {
        ?>

                                                <tr>
                                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                    <td>
                                                        <img src="../<?php echo htmlentities($row['profile_picture']); ?>"
                                                            alt="Profile Pic" width="40" height="40">
                                                    </td>
                                                    <td><?php echo htmlentities($row['name']); ?></td>
                                                    <td><?php echo htmlentities($row['email']); ?></td>
                                                    <td><?php echo htmlentities($row['mobile']); ?></td>
                                                    <td style="margin-top: 5px;"
                                                        class="btn <?php echo $row['Is_Active'] == 1 ? 'btn-success' : 'btn-danger'; ?>">
                                                        <?php 
        echo $row['Is_Active'] == 1 ? 'Active' : 'Deactive'; 
    ?>
                                                    </td>

                                                    <td>
                                                        <?php 
                    // Assuming 'created_at' is stored in a datetime format, you can format it as needed
                    echo date('d-m-Y H:i:s', strtotime($row['created_at']));
                ?>
                                                    </td>
                                                    <td>

                                                        <a
                                                        href="List-User.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del">
                                                            <i class="fa fa-lock" style="color: #f05050 ; font-size: 20px"
                                                                title="Deactivate User"></i>
                                                        </a>


                                                    </td>
                                                </tr>
                                                <?php
        $cnt++;
        } 
        ?>
                                            </tbody>
                                        </table>

                                    </div>




                                </div>

                            </div>


                        </div>
                        <!--- end row -->



                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="m-b-30">

                                        <h4><i class="fa fa-trash-o"></i> Deactive Users</h4>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-danger">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Profile Pic</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
        $query = mysqli_query($con, "SELECT * FROM users WHERE Is_Active = 0");
        $cnt = 1;
        while ($row = mysqli_fetch_array($query)) {
        ?>

                                                <tr>
                                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                    <td>
                                                        <img src="../<?php echo htmlentities($row['profile_picture']); ?>"
                                                            alt="Profile Pic" width="40" height="40">
                                                    </td>
                                                    <td><?php echo htmlentities($row['name']); ?></td>
                                                    <td><?php echo htmlentities($row['email']); ?></td>
                                                    <td><?php echo htmlentities($row['mobile']); ?></td>
                                                    <td style="margin-top: 5px;"
                                                        class=" btn <?php echo $row['Is_Active'] == 1 ? 'btn-success' : 'btn-danger'; ?>">
                                                        <?php 
        echo $row['Is_Active'] == 1 ? 'Active' : 'Deactive'; 
    ?>
                                                    </td>

                                                    <td>
                                                        <?php 
                    // Assuming 'created_at' is stored in a datetime format, you can format it as needed
                    echo date('d-m-Y H:i:s', strtotime($row['created_at']));
                ?>
                                                    </td>
                                                    <td>
                                                  
                                                        <a
                                                            href="List-User.php?resid=<?php echo htmlentities($row['id']); ?>&&action=del">
                                                            <i class="ion-arrow-return-right" style="color: #f05050;font-size: 20px"
                                                                title="Restore User"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
        $cnt++;
        } 
        ?>
                                            </tbody>
                                        </table>
                                    </div>




                                </div>

                            </div>


                        </div>


















                    </div> <!-- container -->

                </div> <!-- content -->
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