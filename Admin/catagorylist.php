<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($Up)) {
        $query = "select * from tbl_category_type where category_id =" . $CID;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($resultData = mysqli_fetch_array($result))

            $strUp = "update tbl_category_type set IsActive=" . $Up . " where category_id=" . $CID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        $strUp = "update tblcategory set IsActive=" . $Up . " where id=" . $CID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }
    if (isset($Ap)) {
        $query = "select * from tbl_category_type where category_id =" . $AID;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while ($resultData = mysqli_fetch_array($result))

            $strUp = "update tbl_category_type set IsActive=" . $Ap . ",IsApprove=" . $Ap . ",ApproveBy='" . $_SESSION["AdminID"] . "' where category_id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        $strUp = "update tblcategory set IsActive=" . $Ap . ",IsApprove=" . $Ap . ",ApproveBy='" . $_SESSION["AdminID"] . "' where id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        $url = "catagorylist.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }

    ?>

</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">
                    <?php
                    if ($_SESSION["IsInsert"] == 1 || $_SESSION["IsInsert"] == NULL) {

                    ?>
                        <h1 class="">Catagory</h1>
                        <a href="catagory.php">
                            <button type="button" class="btn btn-primary">Add New</button>
                        </a>
                    <?php
                    }
                    ?>

                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 115px;">Sr No.</th>
                            <th>Category Name</th>
                            <th style="width: 30px;">Active</th>
                            <th style="width: 30px;">Approve</th>
                            <th style="width: 10px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "ruper");
                        $no = 1;
                        $str = "select * from tblcategory order by id desc";
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
                                <td><?php echo $res["category"]; ?></td>
                                <td align="center">
                                    <?php
                                    if ($res["IsActive"] == 1) {
                                    ?>
                                        <a href="?Up=0&CID=<?php echo $res["id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?Up=1&CID=<?php echo $res["id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($res["IsApprove"] == 1) {
                                    ?>
                                        <a href="?Ap=0&AID=<?php echo $res["id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?Ap=1&AID=<?php echo $res["id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($_SESSION["IsUpdate"] == 1 || $_SESSION["IsUpdate"] == NULL) {
                                    ?>
                                        <a href="catagory.php?UID=<?php echo $res["id"]; ?>"><i class="fa-solid fa-pen" style="color:blue;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
                                    <?php
                                    }
                                    ?>
                                    <a href="categorytypelist.php?CateId=<?php echo $res["id"]; ?>"><i class="fa-solid fa-ellipsis" data-toggle="tool-tip" data-placement="bottom" title="View Category Type"></i></a>


                                </td>
                            <?php


                        }
                            ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>