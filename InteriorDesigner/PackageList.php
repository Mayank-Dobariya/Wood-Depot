<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once 'AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);



    ?>

</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">

                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">PackageList</h1>
                    <a href="PackageAdd.php">
                    </a>

                </div>
                <table class="table bg-white display nowrap " id="example">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>

                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $str = "select * from tbl_si_package si,tbl_package p where p.package_id=si.package_id and interior_designer_id=" . $_SESSION["InteriorDesignerID"];
                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                        $res = mysqli_fetch_array($rs);
                        ?>
                        <tr>
                            <?php
                            $imgName = $res["image_url"];

                            ?>
                            <td><img src="../<?php echo $imgName; ?>" style="height:150px;width:150px;" class="img-circle avatar"></td>
                            <td><?php echo $res["package_name"] . " Package"; ?></td>
                            <td><?php echo $res["price"] . " Rs."; ?></td>
                            <td><?php echo $res["StartDate"]; ?></td>
                            <td><?php echo $res["EndDate"]; ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>