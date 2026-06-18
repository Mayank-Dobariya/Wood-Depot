<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once 'AdminLink.php';
    include_once 'AdminHome.php';
    include_once 'connection.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($Up)) {
        $strUp = "update tbl_admin set IsActive=" . $Up . " where admin_id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }
    if (isset($Ins)) {
        $strUp = "update tbl_admin set IsInsert=" . $Ins . " where admin_id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }
    if (isset($Update)) {
        $strUp = "update tbl_admin set IsUpdate=" . $Update . " where admin_id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }
    if (isset($Delete)) {
        $strUp = "update tbl_admin set IsDelete=" . $Delete . " where admin_id=" . $AID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }


    ?>

</head>

<body>

    <form method="post">
        <div class="content-wrapper ">
            <div class="content-header mt-5">
                <div class="container-fluid">
                    <div class="row d-flex center mb-3">

                        <b>
                            <h1 style="color:black;">Admins</h1>
                        </b>
                        <a href="AdminRegistration.php">
                            <button type="button" class="btn btn-primary">Registration</button>
                        </a>

                    </div>
                    <table class="table bg-white display nowrap" id="example"  style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">profile</th>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL ID</th>
                                <th scope="col">CONTACT NO</th>
                                <th scope="col">CREATED BY</th>
                                <th scope="col">INSERT</th>
                                <th scope="col">UPDATE</th>
                                <th scope="col">DELETE</th>
                                <th scope="col">ACTIVE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $str = "select a.*,b.name as Creator from tbl_admin a, tbl_admin b  where a.CreatedBy = b.admin_id and a.IsSuper=0";
                            $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                            while ($res = mysqli_fetch_array($rs)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        $imgName = $res["image_url"];
                                        // if (file_exists("../uploads/$imgName")) {
                                        //    echo $imgName;
                                        // }
                                        ?>
                                        <img src="../<?php echo $imgName; ?>" class="img-circle avatar" style="width: 60px;height: 60px;">


                                    </td>
                                    <td> <?php echo $res["name"]; ?> </td>
                                    <td> <?php echo $res["email"]; ?> </td>
                                    <td> <?php echo $res["contactno"]; ?> </td>
                                    <td> <?php echo $res["Creator"]; ?> </td>
                                    <td>
                                        <?php
                                        if ($res["IsInsert"] == 1) {
                                        ?>
                                            <a href="Adminlist.php?Ins=0&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;font-size: 21px;"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="Adminlist.php?Ins=1&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-solid fa-xmark"style="color:red;font-size: 21px;"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($res["IsUpdate"] == 1) {
                                        ?>
                                            <a href="?Update=0&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;font-size: 21px;"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?Update=1&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;font-size: 21px;"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($res["IsDelete"] == 1) {
                                        ?>
                                            <a href="?Delete=0&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;font-size: 21px;"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?Delete=1&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;font-size: 21px;"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($res["IsActive"] == 1) {
                                        ?>
                                            <a href="?Up=0&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;font-size: 21px;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?Up=1&AID=<?php echo $res["admin_id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;font-size: 21px;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                        <?php
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