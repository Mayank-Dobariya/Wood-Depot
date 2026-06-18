<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once 'AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($btnConfirm)) {
        $strIns = "insert into tbl_request_designer values(null,$hdnID," . $_SESSION["InteriorDesignerID"] . ",now(),1)";
        mysqli_query($conn, $strIns) or die(mysqli_error($conn));

        $strUp = "update tbl_designer_requirement set IsActive=0 where designer_requirement_id=" . $hdnID;
        mysqli_query($conn, $strUp) or die(mysqli_error($conn));

        $message = "Welcome in Woodenstreet as a Client.<br>Thank You for Interior Designer Request.<br>My Self : " . $_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "<br>Now I can help you for interior designing";
        mail($hdnEmail, 'Your Request Accepted', $message, 'Content-type:text/html;charset=iso-8859-1');

        $url = "UserRequestList.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }

    ?>

</head>

<body>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">User Request </h1>
                    <i class="mr-5 fa-solid fa-arrows-rotate"></i>

                </div>
                <form method="post">
                    <table class="table bg-white display nowrap " id="example">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">USER NAME</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">BUDGET</th>
                                <th scope="col">EMAIL ID</th>
                                <th scope="col">CONFIRM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $str = "select *,d.email as eid from tbl_designer_requirement d,tbluser u where u.user_id=d.user_id and d.IsActive=1";
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
                                    <td><?php echo $res["description"]; ?></td>
                                    <td><?php echo $res["budget"] . " Rs."; ?></td>
                                    <td><?php echo $res["eid"]; ?>
                                        <input type="hidden" name="hdnEmail" value="<?php echo $res["eid"]; ?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="btnConfirm" value="Confirm" class="btn btn-primary">
                                        <input type="hidden" name="hdnID" value="<?php echo $res["designer_requirement_id"]; ?>">
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