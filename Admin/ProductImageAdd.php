<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($_REQUEST["btnSave"])) {  
        if (isset($UID)) {
            $fileName = $hdnName;
            if (!empty($_FILES["File"]["name"])) {
                // if (file_exists("../Uploadfile/$fileName")) {
                //     unlink("../Uploadfile/$fileName");
                // }
                $fileName = "uploads/" . $_FILES["File"]["name"];
                move_uploaded_file($_FILES["File"]["tmp_name"], "../$fileName");
            }
            $strUp = "update tbl_product_image set image_url='$fileName' where product_image_id=" . $UID;
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
            // header("location:ProductImage.php");
            $url = "productimage.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        } else {
            $pid = $_SESSION["ProdID"];
            if (!empty($_FILES["File"]["name"][0])) {
                foreach ($_FILES["File"]["name"] as $key => $filename) {
                    $img = "uploads/" . $filename;
                    $str = "insert into tbl_product_image values(null,'$img','$pid',0)";
                    mysqli_query($conn, $str) or die(mysqli_error($conn));
                    move_uploaded_file($_FILES["File"]["tmp_name"][$key], "../$img");
                }
            }
            // header("location:ProductImage.php");
            $url = "productimage.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }

    if (isset($UID)) {
        $strSel = "select image_url from tbl_product_image where product_image_id=" . $UID;
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
                                <h2 class="card-title">Add Image</h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" method="post" enctype="multipart/form-data">
                                <?php

                                // $txtn=$_REQUEST['txtname'];

                                ?>
                                <div class="card-body">
                                    <div class="form-group">

                                        <label>Image :</label>&nbsp;&nbsp;
                                        <?php
                                        if (isset($UID)) { ?>
                                            <input type="file" name="File" id="field-file" class="form-control field-file">
                                        <?php
                                        } else { ?>
                                            <input type="file" name="File[]" id="field-file" class="form-control field-file" multiple="multiple">
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="hdnName" value="<?php if (isset($resSel)) echo $resSel["image_url"]; ?>">


                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" id="btnsave" class="btn btn-primary" name="btnSave">Save</button>

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