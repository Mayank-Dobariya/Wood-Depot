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

                    <h1 style="color:black;">Inquiry List</h1>


                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SR NO></th>
                            <th scope="col">SUBJECT</th>
                            <th scope="col">EMAILID</th>
                            <th scope="col">REPLAY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // $str = "select * from tblinquiry";
                        $str = "select * from tbl_inquiry i left join tbl_product p on p.product_id = i.product_id where P.admin_id != 'null' or i.product_id IS NULL and i.interior_designer_id IS NULL";
                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                        while ($res = mysqli_fetch_array($rs)) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $no;
                                    $no++;
                                    ?>
                                </td>
                                <td><?php echo $res["subject"]; ?>
                                </td>
                                <td><?php echo $res["email"]; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($res["IsReply"] == 1) {
                                    ?>
                                        <a href="InquiryReply.php?IID=<?php echo $res["inquiry_id"]; ?>"><i class="fa-sharp fa-solid fa-check" style="font-size: 20px;color: blue;" data-toggle="tool-tip" data-placement="bottom" title="Reply"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="InquiryReply.php?IID=<?php echo $res["inquiry_id"]; ?>"><i class="fa-solid fa-xmark" style="font-size: 20px;color: red;" data-toggle="tool-tip" data-placement="bottom" title="Not Reply"></i></a>
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

</body>

</html>