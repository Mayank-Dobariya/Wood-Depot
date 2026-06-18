<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';

    extract($_REQUEST);
    if (isset($Up)) {
        $strUp = "update tbl_design_type set is_active=" . $Up . " where design_type_id=" . $CID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }

    ?>
</head>

<body>

    <div class="content-wrapper ">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">Design Type</h1>
                    <a href="DesignTypeAdd.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>

                </div>
                <table class="table bg-white display nowrap " id="example">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">DESIGN TYPE NAME</th>
                            <th scope="col">ACTIVE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $str = "select * from tbl_design_type";
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
                                <td><?php echo $res["design_type_name"]; ?></td>
                                <td>
                                    <?php
                                    if ($res["is_active"] == 1) {
                                    ?>
                                        <a href="?Up=0&CID=<?php echo $res["design_type_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="color:green;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?Up=1&CID=<?php echo $res["design_type_id"]; ?>"><i class="fa-solid fa-xmark" style="color:red;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><a href="DesignTypeAdd.php?UID=<?php echo $res["design_type_id"]; ?>"><i class="fa-sharp fa-solid fa-pencil" style="color:blue;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
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

</body>

</html>