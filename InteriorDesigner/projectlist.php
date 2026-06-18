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
        $strUp = "update tbl_designer_project set is_visible=" . $Up . " where designer_project_id=" . $VID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
    }

    ?>
</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">Project</h1>
                    <a href="projectAdd.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                    </a>

                </div>
                <table class="table bg-white display nowrap" id="example">
                <thead>
                            <tr>
                            <th scope="col">no</th>

                                <th scope="col">project</th>
                                <th scope="col">name-location</th>
                                <th scope="col">visible</th>
                                <th scope="col">detail</th>
                                
                            </tr>
                        </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        $str = "select * from tbl_designer_project_image i,tbl_designer_project d where i.is_default=1 and i.designer_project_id=d.designer_project_id and d.interior_designer_id=" . $_SESSION["InteriorDesignerID"];

                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        if (mysqli_num_rows($rs) > 0) {
                            while ($res = mysqli_fetch_array($rs)) {
                        ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $no;
                                        $no++;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $imgName = $res["image_url"];
                                        // if(!file_exists("../Uploadfile/$imgName"))
                                        // {
                                        // 	$imgName="no-image.png";
                                        // }
                                        ?>
                                        <a href="ProjectImage.php?id=<?php echo $res["designer_project_id"]; ?>"><img src="../<?php echo $imgName; ?>" class="img-fluid" alt="Design" title="View More" style="width: 520px;height: 300px;margin-left:10px;"></a>
                                    </td>
                                    <td>
                                        <h4><span class="user-name"><?php echo $res["designer_project_name"] . " - " . $res["location"]; ?></span></h4>
                                    </td>
                                    <td >
                                        <?php
                                        if ($res["is_visible"] == 1) {
                                        ?>
                                            <a href="?Up=0&VID=<?php echo $res["designer_project_id"]; ?>"><i class="fa-solid fa-eye" data-toggle="tool-tip" data-placement="bottom" title="Visible" style="font-size: 18px;color:black;margin-left: 85px;margin-top: 10px;"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?Up=1&VID=<?php echo $res["designer_project_id"]; ?>"><i class="fa-solid fa-eye-slash" data-toggle="tool-tip" data-placement="bottom" title="Unvisible" style="font-size: 18px;color:black;margin-left: 85px;margin-top: 10px;"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="ProjectDetail.php?ProjectID=<?php echo $res["designer_project_id"]; ?>"><i class="fa-solid fa-ellipsis" data-toggle="tool-tip" data-placement="bottom" title="View Details" style="font-size: 15px;color:black;margin-top: 10px;"></i></a>
                                    </td>

                            <?php
                            }
                        } else {
                            echo "<center><h4>No Project Available</h4></center>";
                        }
                            ?>

                                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>