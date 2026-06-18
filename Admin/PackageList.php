<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once 'AdminLink.php';
    include_once 'AdminHome.php';

    SessionCheck();

    ?>

</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">

                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">PackageList</h1>
                    <a href="PackageAdd.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>

                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SR NO</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">PACKAGE NAME</th>
                            <th scope="col">DURATION</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $str = "select * from tbl_package";
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
                                <td><?php echo $res['package_name']; ?></td>
                                <td><?php echo $res['duration'] . " Month"; ?></td>
                                <td><?php echo $res['price'] . " Rs."; ?></td>
                                <td>
                                    <a href="PackageAdd.php?UID=<?php echo $res["package_id"]; ?>"><i class="fa-sharp fa-solid fa-pencil" style="color:blue;" data-toggle="tool-tip" data-placement="bottom" title="Edit"></i></a>
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