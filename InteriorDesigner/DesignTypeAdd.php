<!DOCTYPE html>

<html lang="en">

<head>

    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();

    extract($_REQUEST);
    if (isset($btnSave)) {
        if (isset($UID)) {
            // $strUp = "update tbl_design_type set design_type_name='$txtName' where design_type_id=" . $UID;
            // mysqli_query($conn, $strUp) or die(mysqli_error($conn));
            // header("location:DesignTypeList.php");
        } else {
            $strIns = "insert into tbl_design_type values(null,'$txtName',1)";
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
            // header("location:DesignTypeList.php");
            $url = "DesignTypeList.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }
    if (isset($UID)) {
        $strSel = "select design_type_name from tbl_design_type where design_type_id=" . $UID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);
    }

    ?>

</head>




<body>




    <div class="content-wrapper">
        <div class="content-header mt-5">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Add Design Type </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Type Name</label>
                                        <input type="text" name="txtName" class="form-control" placeholder="Enter Design Type Name" value="<?php if (isset($resSel)) echo $resSel["design_type_name"]; ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>









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