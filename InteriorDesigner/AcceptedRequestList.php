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


    <div class="content-wrapper ">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">Accepted Request List</h1>
                    <i class="mr-5 fa-solid fa-arrows-rotate"></i>

                </div>
                <form method="post">
                    <table class="table bg-white display nowrap " id="example">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">USER NAME</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">ACCEPT ON</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $str = "select *,r.CreatedaOn as AcceptOn from tbluser u,tbl_request_designer r,tbl_designer_requirement d where  r.designer_requirement_id=d.designer_requirement_id and d.user_id=u.user_id and r.interior_designer_id=" . $_SESSION["InteriorDesignerID"];

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
                                    <td><?php echo $res["first_name"] . " " . $res["last_name"]; ?></td>
                                    <td><?php echo $res["subject"]; ?>
                                    </td>
                                    <td><?php echo $res["AcceptOn"]; ?>
                                    </td>
                                </tr>
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