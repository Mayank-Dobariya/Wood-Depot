<!DOCTYPE html>

<html lang="en">

<head>

    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();

    extract($_REQUEST);
    if (isset($btnsave)) {
        $category = trim($txtname);

        // Check if category name is valid
        if (empty($category)) {
            echo "<script>alert('Please enter a valid category name')</script>";
        } else {
            if (isset($UID)) {
                $u_id = $UID;
                $strUp = "update tblcategory set category='$category' where id=$u_id";
                mysqli_query($conn, $strUp) or die(mysqli_error($conn));
                // header("location:catagorylist.php");
                $url="catagorylist.php";
                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
            } else {
                $sql = "SELECT * FROM tblcategory WHERE category = '$category'";
                $result = mysqli_query($conn, $sql);

                // Check if category already exists
                if (mysqli_num_rows($result) > 0) {
                     
                    $url="catagory.php?err=Category already exists in database";
                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                } else {
                    $strIns = "insert into tblcategory values(null,'$category',1,1,0)";
                    mysqli_query($conn, $strIns) or die(mysqli_error($conn));
                    // header("location:catagorylist.php");
                    $url="catagorylist.php";
                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                }
            }
        }
    }
    if (isset($UID)) {
        $strSel = "select category from tblcategory where id=" . $UID;
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
                                <h2 class="card-title">Add Catagory </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" method="post">
                                <?php

                                // $txtn=$_REQUEST['txtname'];

                                ?>
                                <div class="card-body">
                                    <div class="form-group">

                                        <label>Category Name</label>
                                        <input type="text" name="txtname" class="form-control" placeholder="Enter Category Name" id="txtname" value="<?php if (isset($resSel)) echo $resSel["category"]; ?>">
                                      
                                        <?php
                                        if(isset($_GET['err']))
                                        {
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