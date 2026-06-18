<!DOCTYPE html>


<html lang="en">

<head>

    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($CateId)) {
        $_SESSION["CateID"] = $CateId;
    }
    if (isset($_REQUEST['btnsave'])) {
        $categorytype = trim($txtname);
        // Check if category name is valid
        if (empty($categorytype)) {
            echo "<script>alert('Please enter a valid category type name')</script>";
        } else {
            if (isset($UID)) {
                $u_id = $UID;
                // $CID = $_SESSION['CID'];
                $strUp = "update tbl_category_type set category_type_name='$txtname' where id=$u_id";
                mysqli_query($conn, $strUp) or die(mysqli_error($conn));
                // header("location:categorytypelist.php?CateId=" . $_SESSION['CID']);
                $url = "categorytypelist.php?CateId=".$_SESSION["CateID"];
                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
            } else {
                $sql = "SELECT * FROM tbl_category_type WHERE category_type_name = '$categorytype'";
                $result = mysqli_query($conn, $sql);

                // Check if category already exists
                if (mysqli_num_rows($result) > 0) {

                    $url = "categorytypeadd.php?err=Category type already exists in database";
                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                } else {



                    // $CID = $_SESSION['CID'];
                    $txtName = $_REQUEST['txtname'];
                    $strIns = "insert into tbl_category_type values(null,'$txtName',".$_SESSION["CateID"].",1,1,'" . $_SESSION["AdminID"] . "')";
                    mysqli_query($conn, $strIns) or die(mysqli_error($conn));
                    $url = "categorytypelist.php?CateId=".$_SESSION["CateID"];
                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                }
            }
        }
    }




    if (isset($UID)) {
        $strSel = "select * from tbl_category_type where id=" . $UID;
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
                                <h2 class="card-title">Add Catagory Type </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <?php

                                        $str = "select category from tblcategory where id=" . $_SESSION["CateID"];
                                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                                        $res = mysqli_fetch_array($rs);
                                        ?>

                                        <label>Category Type Name <?php echo $res['category']; ?></label>

                                        <input type="text" name="txtname" class="form-control" placeholder="Enter Category Type Name" id="txtname" value="<?php if (isset($resSel)) echo $resSel["category_type_name"]; ?>">

                                        <?php
                                        if (isset($_GET['err'])) {
                                            echo $_GET['err'];
                                        }
                                        ?>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" id="btnsave" class="btn btn-primary" name="btnsave">Save</button>
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