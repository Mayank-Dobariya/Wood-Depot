<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once 'AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if(isset($BlockUp))
{
	if($BlockUp==0)
	{
		$strUp="update tbluser set IsActive=1,IsBlock=0,BlockBy='".is_null("BlockBy")."' where user_id=".$UID;
		mysqli_query($conn,$strUp) or die(mysqli_error($conn));

		// $strUp="update tbluser set IsActive=1,IsBlock=".$BlockUp.",BlockedBy='".is_null("BlockedBy")."' where UserID=".$UID;
		// mysqli_query($conn,$strUp) or die(mysqli_error($conn));
	}
	else
	{
		$strUp="update tbluser set IsActive=0,IsBlock=1,BlockBy=".$_SESSION["AdminID"]." where user_id=".$UID;
		mysqli_query($conn,$strUp) or die(mysqli_error($conn));
	}
}

    ?>

</head>

<body>


    <div class="content-wrapper ">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <h1 style="color:black;">Customers</h1>
                    <i class="mr-5 fa-solid fa-arrows-rotate"></i>

                </div>
                <table class="table bg-white display nowrap" id="example" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL ID</th>
                            <th scope="col">CONTACT NO</th>
                            <th scope="col">ACTIVE</th>
                            <th scope="col">BLOCK</th>
                            <th scope="col">BLOCK BY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $str = "select u.*, a.name from tbluser u left join tbl_admin a on u.BlockBy=a.admin_id";
                        $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                        while ($res = mysqli_fetch_array($rs)) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    $imgName = $res["img_url"];

                                    ?>
                                    <img src="../<?php echo $imgName; ?>" class="img-circle avatar" style="height:70px;width:70px;">
                                </td>
                                <td><?php echo $res["first_name"] . " " . $res["last_name"]; ?>
                                </td>
                                <td><?php echo $res["email"]; ?></td>
                                <td><?php echo $res["contact_no"]; ?></td>
                                <td>
                                    <?php
                                    if ($res["IsActive"] == 1) {
                                    ?>
                                        <i class="fa-sharp fa-solid fa-check" style="color:green;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="Active"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="fa-solid fa-xmark" style="color:red;font-size: 20px;" data-toggle="tool-tip" data-placement="bottom" title="Deactive"></i>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($res["IsBlock"] == 0) {
                                    ?>

                                        <a href="?BlockUp=1&UID=<?php echo $res["user_id"]; ?>"><i class="fas fa-user-alt" style="font-size: 18px;" data-toggle="tool-tip" data-placement="bottom" title="Unblock"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?BlockUp=0&UID=<?php echo $res["user_id"]; ?>"><i class="fas fa-user-alt-slash" style="font-size: 18px;" data-toggle="tool-tip" data-placement="bottom" title="Block"></i></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($res["BlockBy"] == 0 || $res["BlockBy"] == NULL) {
                                    ?>
                                        <i class="fas fa-minus" style="font-size: 18px;"></i>
                                    <?php
                                    } else {
                                        echo $res["name"];
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