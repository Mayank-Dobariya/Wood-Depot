<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    extract($_REQUEST);
    SessionCheck();
    if (isset($ProdID)) {
        $_SESSION["ProdID"] = $ProdID;
    }
    if (isset($DID)) {
        $strSel = "select * from tbl_product_image where product_image_id=" . $DID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);
        $Imgname = $resSel["image_url"];
        // if (file_exists("../Uploadfile/$Imgname")) {
        //     unlink("../Uploadfile/$Imgname");
        // }
        $strDel = "delete from tbl_product_image where product_image_id=" . $DID;
        mysqli_query($conn, $strDel) or die(mysqli_error($conn));
        // header("location:productimage.php");
        $url = "productimage.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }
    if (isset($PIID)) {
        $strUp = "update tbl_product_image set IsDefault=0 where product_id=" . $_SESSION["ProdID"];
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        $strUp1 = "update tbl_product_image set IsDefault=1 where product_image_id=" . $PIID;
        mysqli_query($conn, $strUp1) or die(mysqli_error($conn));
        // header("location:ProductImage.php");
        $url = "ProductImage.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }


    ?>
</head>

<body>
    <form method="post">
        <div class="content-wrapper">
            <div class="content-header mt-5">
                <div class="container-fluid">
                    <div class="row d-flex center mb-3">

                        <h1 class="">Product Image</h1>
                        <?php
                        if ($_SESSION["IsInsert"] == 1 || $_SESSION["IsInsert"] == NULL) {
                            $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                            $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                            $resP = mysqli_fetch_array($rsP);
                            if ($resP["admin_id"] != NULL) {
                        ?>
                                <a href="ProductImageAdd.php?ProdID=<?php echo $_SESSION["ProdID"] ?>" class="btn btn-primary">Add New
                                </a>
                        <?php
                            }
                        }
                        ?>

                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th style="width: 115px;">Sr No.</th>

                                <th style="width: 850px;">Image</th>
                                <?php $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                                $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                                $resP = mysqli_fetch_array($rsP);
                                if ($resP["admin_id"] != NULL) { ?>
                                    <th>Default</th>

                                    <?php }
                                if ($_SESSION["IsUpdate"] == 1 || $_SESSION["IsUpdate"] == NULL || $_SESSION["IsDelete"] == 1 || $_SESSION["IsDelete"] == NULL) {
                                    $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                                    $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                                    $resP = mysqli_fetch_array($rsP);
                                    if ($resP["admin_id"] != NULL) {
                                    ?>
                                        <th>Action</th>
                                <?php }
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $str = "select * from tbl_product_image where product_id=" . $_SESSION["ProdID"];
                            $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                            while ($res = mysqli_fetch_array($rs)) {
                            ?>
                                <tr class="gradeX">

                                    <td>
                                        <?php
                                        echo $no;
                                        $no++;
                                        ?>
                                    </td>

                                    <td align="center">
                                        <?php
                                        $imgName = $res["image_url"];

                                        ?>
                                        <img src="../<?php echo $imgName; ?>" class="img-thumbnail" style="height:200px;width:500px;" />
                                    </td>
                                    <?php $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                                    $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                                    $resP = mysqli_fetch_array($rsP);
                                    if ($resP["admin_id"] != NULL) { ?>
                                        <td align="center">
                                            <?php
                                            if ($res["IsDefault"] == 1) {
                                            ?>
                                                <a href="?PIID=<?php echo $res["product_image_id"]; ?>">Yes</a><?php
                                                                                                            } else {
                                                                                                                ?>
                                                <a href="?PIID=<?php echo $res["product_image_id"]; ?>">No</a><?php
                                                                                                            }
                                                                                                                ?>
                                        </td>
                                        <td align="center">
                                            <?php }
                                        if ($_SESSION["IsUpdate"] == 1 || $_SESSION["IsUpdate"] == NULL) {
                                            $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                                            $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                                            $resP = mysqli_fetch_array($rsP);
                                            if ($resP["admin_id"] != NULL) {
                                            ?>
                                                <a href="ProductImageAdd.php?UID=<?php echo $res["product_image_id"]; ?>"><i class="fa-solid fa-pen" style="color:green;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
                                            <?php
                                            }
                                        }
                                        if ($_SESSION["IsDelete"] == 1 || $_SESSION["IsDelete"] == NULL) {
                                            $strP = "select admin_id from tbl_product where product_id=" . $_SESSION["ProdID"];
                                            $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
                                            $resP = mysqli_fetch_array($rsP);
                                            if ($resP["admin_id"] != NULL) {
                                            ?>
                                                <a onclick="return confirm('Are you sure you want to delete this Image?');" href="?DID=<?php echo $res["product_image_id"]; ?>"><i class="fa-solid fa-trash" style="color:red;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="Delete"></i></a>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </form>
</body>

</html>