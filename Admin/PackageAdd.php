<!DOCTYPE html>

<html lang="en">

<head>
    <!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="Validation.js"></script>
    <?php

    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($btnSave)) {
        if (isset($UID)) {
            $fileName = $hdnName;
            if (!empty($_FILES["File"]["name"])) {
            //     if (file_exists("../Uploadfile/$fileName")) {
            //         unlink("../Uploadfile/$fileName");
            //     }
            // $fileName = $_FILES["File"]["name"];
            $fileName = "uploads/" . $_FILES["File"]["name"];
            move_uploaded_file($_FILES["File"]["tmp_name"], "../$fileName");
            }
            $strUp = "update tbl_package set package_name='$txtName',duration=$txtDuration,price=$txtPrice,description='$txtDescription',image_url='$fileName' where package_id=" . $UID;
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
            // header("location:PackageList.php");
            $url="PackageList.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        } else {
            $fileName = $_FILES["File"]["name"];
            $ImgName = "uploads/" . $fileName;
            if ($_FILES["File"]["error"] > 0) {
                $error = $_FILES["File"]["error"];
                // echo $error;
            } else {
                move_uploaded_file($_FILES["File"]["tmp_name"], '../uploads/' . $fileName);
            }
            $strIns = "insert into tbl_package values(null,'$txtName',$txtDuration,$txtPrice,'$txtDescription',now()," . $_SESSION["AdminID"] . ",'$ImgName')";
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
            // header("location:PackageList.php");
            $url="PackageList.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }
    if (isset($UID)) {
        $strSel = "select * from tbl_package where package_id=" . $UID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);
    }

    ?>
    <style>
        .err {
            color: red;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }
    </style>

</head>



<body>




    <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Add Package </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" class="pkg_form" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Package Name</label>
                                        <input type="text" name="txtName" id="txtName" class="form-control pg_name" placeholder="Enter Package Name" value="<?php if (isset($resSel)) echo $resSel["package_name"]; ?>">
                                        <span class="err">Plese Enter Your Name</span>
                                        &nbsp;&nbsp;



                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="text" maxlength="2" name="txtDuration" id="txtDuration" class="form-control pg_duration" placeholder="Enter Duration in Month" value="<?php if (isset($resSel)) echo $resSel["duration"]; ?>">
                                        <span class="err">Plese Enter Duration</span>

                                        &nbsp;&nbsp;
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" maxlength="8" id="txtPrice" name="txtPrice" class="form-control pg_price" placeholder="Enter Price" value="<?php if (isset($resSel)) echo $resSel["price"]; ?>">
                                        <span class="err">Plese Enter Price</span>

                                        &nbsp;&nbsp;
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control pg_description" rows="10" name="txtDescription" value="<?php if (isset($resSel)) echo $resSel["description"]; ?>"></textarea>
                                        <span class="err">Plese Enter Description</span>

                                    </div>




                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">File Field</label>

                                        <?php
                                        if (!isset($UID)) {
                                        ?>
                                            <input type="file" name="File" id="field-file" class="form-control field-file pg_file">
                                            <span class="err">Plese Select File</span>

                                        <?php
                                        } else {
                                        ?>
                                            <input type="file" name="File" id="field-file" class="form-control field-file" value="<?php if (isset($resSel)) echo $resSel["image_url"]; ?>"><img src="<?php if (isset($resSel)) echo $resSel["image_url"]; ?>" style=width:80px;height: 80px;>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="hdnName" value="<?php if (isset($resSel)) echo $resSel["image_url"]; ?>">
                                    </div>




                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-primary" name="btnSave">Save</button> -->
                                    <input type="submit" class="btn btn-primary" name="btnSave" value="Save">
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
            <script src="js/jquery-3.6.0.min.js"></script>
            <script src="js/Admn_form_velidation.js"></script>
            <script src="js/Admin_velidation.js"></script>



</body>

</html>