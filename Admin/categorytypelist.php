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


        $strUp = "update tbl_category_type set IsActive=" . $Up . " where id=" . $CID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        // header("location:CategoryTypeList.php?CateID=" . $_SESSION["CateID"]);
    }
    if(isset($Ap))
{
	

	$strUp="update tbl_category_type set IsActive=".$Ap.",IsApprove=".$Ap.",ApproveBy='".$_SESSION["AdminID"]."' where id=".$AID;
	mysqli_query($conn,$strUp) or die(mysqli_error($conn));
	// header("location:CategoryTypeList.php?CateID=".$_SESSION["CateID"]);
}

    if (isset($CateId)) {
        $_SESSION["CateID"] = $CateId;
    }



    ?>

</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <!-- <h1 class="">Catagory Type</h1> -->
                    <?php
                    // $conn = mysqli_connect("localhost", "root", "", "ruper");

                    $str = "select * from tblcategory where id=" . $_SESSION["CateID"];
                    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                    $res = mysqli_fetch_array($rs);
                    ?>
                    <h1 class="">Catagory Type <?php echo $res['category']; ?></h1>
                    <?php
                    if ($_SESSION["IsInsert"] == 1 || $_SESSION["IsInsert"] == NULL) {
                    ?>
                        <a href="categorytypeadd.php?CateId=<?php echo $res["id"]; ?>">
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
                            <th style="width: 30px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $no = 1;

                        $str = "select * from tbl_category_type where category_id=" . $_SESSION["CateID"];
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
                                <td><?php echo $res["category_type_name"]; ?></td>
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
                                        <a href="?Ap=0&AID=<?php echo $res["id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;" data-toggle="tool-tip" data-placement="bottom" title="Approve"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?Ap=1&AID=<?php echo $res["id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;" data-toggle="tool-tip" data-placement="bottom" title="Not Approve"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if ($_SESSION["IsUpdate"] == 1 || $_SESSION["IsUpdate"] == NULL) {
                                    ?>

                                        <a href="categorytypeadd.php?UID=<?php echo $res["id"]; ?>"><i class="fa-solid fa-pen" style="color:blue;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
                                    <?php
                                    }
                                    ?>
                                    <!-- <a href="categorytypelist.php"><i class="icon-dot-3" data-toggle="tool-tip" data-placement="bottom" title="View Category Type"></i>...</a> -->


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