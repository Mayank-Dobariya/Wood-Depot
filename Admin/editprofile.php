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

        $fileName = $hdnName;

        if (!empty($_FILES["txtFile"]["name"])) {


            // $fileName = date('Dys') . $_FILES["txtFile"]["name"];
            // move_uploaded_file($_FILES["txtFile"]["tmp_name"], "../Uploadfile/$fileName");

            $fileName = "uploads/" . $_FILES["txtFile"]["name"];
            move_uploaded_file($_FILES["txtFile"]["tmp_name"], "../$fileName");
            echo $fileName;
        }

        // echo $fileName;

        $strUp = "update tbl_admin set name='$txtName',email='$txtEmail',contactno='$txtContact',image_url='$fileName' where admin_id=" . $_SESSION["AdminID"];
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        // header("location:MyProfile.php");
        $url = "profile.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }
    if (isset($txtName)) {
        $_SESSION["AdminName"] = $txtName;
    }
    if (isset($fileName)) {
        $_SESSION["ImageURL"] = $fileName;
    }

    ?>

</head>

<body>




    <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card text-center">
                            <div class="card-header mb-3">
                                <h1><b>Change Profile</b></h1>
                            </div>
                            <?php
                            $str = "select * from tbl_admin where admin_id=" . $_SESSION["AdminID"];
                            $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                            while ($res = mysqli_fetch_array($rs)) {
                            ?>
                                <form class="mt-5" method="post" enctype="multipart/form-data">
                                    <?php
                                    $imgName = $res["image_url"];
                                    ?>
                                    <div class="text-center">
                                        <img src="../<?php echo $imgName; ?>" class="rounded h-25 w-25">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="txtName" value="<?php echo $res["name"]; ?>" id="txtName">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email Id</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="txtEmail" value="<?php echo $res["email"]; ?>" readonly="redaonly">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Contact No</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="txtContact" maxlength="10" name="txtContact" value="<?php echo $res["contactno"]; ?>" placeholder="Enter Contact No">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="field-file" name="txtFile">
                                            <input type="hidden" name="hdnName" value="<?php echo $res["image_url"]; ?>">
                                        </div>
                                    </div>


                                    <input type="submit" class="btn btn-primary mb-3" name="btnSave" value="Save">
                                </form>
                            <?php
                            }
                            ?>

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