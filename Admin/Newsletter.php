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

                <div class="row d-flex justify-content-between mb-3">

                    <h1 style="color:black;">Newsletter </h1>


                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">EMAIL ID</th>
                            <th scope="col">SEND</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $str = "select * from tbl_newsletter";
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
                                <td><?php echo $res["email"]; ?></td>
                                <td><a href="NewsletterSend.php?NID=<?php echo $res["newsletterid"] ?>"><i class="fa-solid fa-share" style="font-size: 20px;color:black;" data-toggle="tool-tip" data-placement="bottom" title="Reply"></i></a></td>

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