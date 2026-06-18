<!DOCTYPE html>

<html lang="en">

<head>
    <!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';

    SessionCheck();
    extract($_REQUEST);



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
                                <h2 class="card-title">Add Project </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" method="post" enctype="multipart/form-data">
                                <?php
                                if (isset($btnSave)) {
                                    $strIns = "insert into tbl_designer_project values(null,'$txtProjectName','$txtDescription','$txtLocation'," . $_SESSION["InteriorDesignerID"] . ",$cmbType,1)";
                                    mysqli_query($conn, $strIns) or die(mysqli_error($conn));

                                    $Pid = mysqli_insert_id($conn);
                                    if (!empty($_FILES["File"]["name"][0])) {
                                        $Def = 1;
                                        foreach ($_FILES["File"]["name"] as $key => $filename) {

                                            $ImgName = "uploads/$filename";

                                            $strInsImg = "insert into tbl_designer_project_image values(null,$Pid,'$ImgName',$Def)";
                                            mysqli_query($conn, $strInsImg) or die(mysqli_error($conn));
                                            move_uploaded_file($_FILES["File"]["tmp_name"]["$key"], "../uploads/$filename");

                                            $Def = 0;
                                        }
                                    }

                                    // header("location:ProjectList.php");
                                    $url = "ProjectList.php";
                                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                }
                                ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input type="text" name="txtProjectName" class="form-control" placeholder="Enter Project Name">
                                    </div>



                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="10" name="txtDescription"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="txtLocation" class="form-control" placeholder="Enter Location">
                                    </div>

                                    <div class="form-group">
                                        <label>Design Type</label>
                                        <select name="cmbType" class="form-select form-control" aria-label="Default select example">
                                            <option selected>Select Category Type</option>
                                            <?php
                                            $strType = "select * from tbl_design_type";
                                            $rsType = mysqli_query($conn, $strType) or die(mysqli_error($conn));
                                            while ($resType = mysqli_fetch_array($rsType)) {
                                            ?>
                                                <option value="<?php echo $resType["design_type_id"]; ?>"><?php echo $resType["design_type_name"]; ?></option>
                                                <?php //if (isset($resSel) && $resType["design_type_id"] == $resSel["design_type_id"]) echo 'selected'; 
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="formFile" name="File[]" multiple="multiple">
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