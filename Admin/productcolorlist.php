<!DOCTYPE html>
<html lang="en">

<head>
    <?php

     include_once './AdminLink.php';
    include_once 'AdminHome.php';
    include_once 'connection.php';
    SessionCheck();

    ?>

</head>
<?php
//  $conn = mysqli_connect("localhost", "root", "", "ruper");  
extract($_REQUEST);
if (isset($_GET['procid'])) {
    $_SESSION["procid"] = $_GET['procid'];
    $procid = $_SESSION["procid"];
}
if (isset($Up)) {
    $pid=$_GET['PID'];
	$strUp = "update tbl_product_variance set is_active=" . $Up . " where product_variance_id=$pid ";
	mysqli_query($conn, $strUp) or die(mysqli_error($conn));
}
?>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 class="">color</h1>
                    <a href="productcoloradd.php?procid=<?php echo $_SESSION["procid"]; ?>">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Card grid view -->
                            <div class="cards-container box-view grid-view">
                                <div class="row">
                                    <?php
                                    // $conn = mysqli_connect("localhost", "root", "", "ruper");
                                    $str = "select * from tbl_product_variance where product_id=".$_SESSION["procid"];
                                    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                                    while ($res = mysqli_fetch_array($rs)) {
                                    ?>
                                        <div class="col-lg-3 col-sm-6 animatedParent animateOnce z-index-50">

                                            <!-- Card -->
                                            <div class="card animated fadeInUp">

                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <div class="card-photo">
                                                        <div style="background-color:<?php echo $res["product_color"]; ?>;height:60px;width:80px;margin-left: 50px;border: 1px solid;">
                                                            <!-- </div> -->
                                                            <!-- <div class="card-short-description" align="right"> -->
                                                            <?php
                                                            if ($res["is_active"] == 1) {
                                                            ?>
                                                                <a href="?Up=0&PID=<?php echo $res["product_variance_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;margin-left: 110px;margin-top: 10px;font-size: 30px;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="?Up=1&PID=<?php echo $res["product_variance_id"]; ?>"><i  class="fa-solid fa-xmark" style="color:red;margin-left: 110px;margin-top: 10px;font-size: 30px;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /card -->

                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /card grid view -->

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</body>

</html>