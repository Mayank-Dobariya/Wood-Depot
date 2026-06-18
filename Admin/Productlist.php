<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    include_once 'connection.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($Up)) {
        $strUp = "update tbl_product set IsActive=" . $Up . " where product_id=" . $PID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }

    ?>
</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 class="">Product</h1>
                    <a href="product.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>

                </div>
                <form>
                    <table class="table bg-white display nowrap" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50px;">Sr No.
                                </th>
                                <th style="width: 80px;">Image</th>
                                <th style="width: 80px;">Name</th>
                                <th style="width: 80px;">Code</th>
                                <th style="width: 80px;">Category</th>
                                <th style="width: 80px;">Active</th>
                                <th style="width: 80px;">Action</th>
                                <!-- <th style="width: 155px;">On Home Page</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $conn = mysqli_connect("localhost", "root", "", "ruper");

                            // $str = "select p.*,pi.*,c.CategoryName from tblproduct p,tblcategory c,tblproductimage pi where p.CategoryID=c.CategoryID and p.ProductID=pi.ProductID and pi.IsDefault=1 and p.SellerID IS NULL order by p.ProductID desc";

                            $no = 1;
                            // $str = "select * from tbl_product,tbl_product_image,tblcategory where tbl_product.product_id=tbl_product_image.product_id and tbl_product.category_id=tblcategory.id";
                            $str = "select p.*,pi.*,c.category from tbl_product p,tbl_product_image pi,tblcategory c where p.category_id=c.id and p.product_id=pi.product_id and pi.IsDefault=1 order by p.product_id desc";
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

                                    <td><img src="../<?php echo $res["image_url"]; ?> " style="height:60px;width:60px;"></td>


                                    <td><?php echo $res['product_name']; ?></td>
                                    <td><?php echo $res['product_code']; ?></td>
                                    <td><?php echo $res['category']; ?></td>
                                    <td>
                                        <?php
                                        if ($res["IsActive"] == 1) {
                                        ?>
                                            <a href="?Up=0&PID=<?php echo $res["product_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="font-size: 20px;color:green;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?Up=1&PID=<?php echo $res["product_id"]; ?>"><i class="fa-solid fa-xmark" style="font-size: 20px;color:red;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_SESSION["IsUpdate"] == 1 || $_SESSION["IsUpdate"] == NULL) { ?>
                                            <a href="product.php?UID=<?php echo $res['product_id']; ?>"><i class="fa-solid fa-pen" style="color:green;font-size: 15px;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <a href="ProductImage.php?ProdID=<?php echo $res['product_id'];?>"><i class="fas fa-images" style="color:black;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="View Image"></i></a>
                                        <a href="productcolorlist.php?procid=<?php echo $res['product_id']; ?>"><i class="fas fa-palette" style="color:green;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="View Color"></i></a>
                                        <!-- <a href="ProductDetail.php"><i class="fa-solid fa-ellipsis" data-toggle="tool-tip" style="font-size: 15px;" data-placement="bottom" title="View Detail"></i></a> -->
                                    </td>

                                <?php
                            }

                                ?>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>


</body>

</html>