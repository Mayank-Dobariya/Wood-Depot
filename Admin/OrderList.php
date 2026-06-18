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

                    <h1 style="color:black;">Order</h1>

                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SR NO></th>
                            <th scope="col">USER NAME</th>
                            <th scope="col">PAYABLE AMOUNT</th>
                            <th scope="col">CREATED ON</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $str = "select *,u.first_name,u.last_name from tbl_order_payment p,tbl_order o,tbluser u where p.order_id=o.order_id and o.user_id=u.user_id and IsPaid=1";
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
                                <td><?php echo $res["first_name"] . " " . $res["last_name"]; ?></td>
                                <td>
                                    <?php echo $res["GrandTotal"]; ?>
                                </td>
                                
                                <td>
                                    <?php echo $res["CreatedOn"]; ?>
                                </td>
                                <td>
                                    <a href="OrderDetail.php?OID=<?php echo $res["order_id"]; ?>"><i class="fa-solid fa-ellipsis" data-toggle="tool-tip" data-placement="bottom" title="View Order Detail"></i> </a>
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