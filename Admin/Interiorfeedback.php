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

                    <h1 style="color:black;">Interior Designer Feedback</h1>


                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SR NO></th>
                            <th scope="col">Interior NAME</th>
                            <th scope="col">REVIEW</th>
                            <th scope="col">CREATED ON</th>
                            <th scope="col">RATING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $str = "select f.*, i.first_name , i.last_name from tbl_interior_designer i,tbl_designer_feedback f where f.interior_designer_id=i.interior_designer_id";
                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                        while ($res = mysqli_fetch_array($rs)) {
                        ?>]
                        <tr>
                            <td>
                                <?php
                                echo $no;
                                $no++;
                                ?>
                            </td>
                            <td><?php echo $res["first_name"] . " " . $res["last_name"]; ?></td>
                            <td><?php echo $res["review"]; ?></td>
                            <td><?php echo $res["createdon"]; ?></td>
                            <td><?php $Val = $res["rating"];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($Val < $i) {
                                ?>
                                        <i class="fa fa-star" style="color: #353535;"></i>
                                    <?php
                                    } else { ?>
                                        <i class="fa fa-star" style="color: #FFC107;"></i>
                                <?php
                                    }
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