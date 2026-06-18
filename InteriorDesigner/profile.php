<!DOCTYPE html>

<html lang="en">

<head>

    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);

    ?>

</head>

<body>



    <form action="" method="post">
        <div class="content-wrapper bg-white">
            <div class="content-header mt-5">

                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <?php
                        $str = "select * from tbl_interior_designer where interior_designer_id=" . $_SESSION["InteriorDesignerID"];
                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                        while ($res = mysqli_fetch_array($rs)) {
                        ?>

                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card text-center">
                                    <div class="card-header mb-3">
                                        <h1><b> My Profile</b></h1>
                                    </div>
                                    <?php
                                    $imgName = $res["image_url"];
                                    // if (!file_exists("../Uploadfile/$imgName")) {
                                    //     $imgName = "no-profile-image.png";
                                    // }
                                    ?>
                                    <div class="text-center">
                                        <img src="../<?php echo $imgName; ?>" class="rounded h-25 w-25">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-text"><b><?php echo $res["first_name"]," ", $res['last_name']; ?></b></h3>
                                        <h4 class="card-text"><?php echo $res["email_id"]; ?></h4>
                                        <p class="card-text"><?php echo $res["contact_no"]; ?></p>
                                    </div>
                                    <div class="card-body">
                                        <a href="editprofile.php" class="btn btn-primary">Edit Profile</a>
                                    </div>

                                </div>
                            </div>


                        <?php
                        }
                        ?>
                    </div>

                </div>






    </form>


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>

</body>

</html>