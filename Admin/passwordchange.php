<!DOCTYPE html>

<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';
    SessionCheck();
    extract($_REQUEST);
    if (isset($btnSave)) {
        $strSel = "select password from tbl_admin where admin_id=" . $_SESSION["AdminID"];
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);
        $pwd = base64_encode($txtPwd);
        $pwdNew = base64_encode($txtNewPwd);
        $pwdCon = base64_encode($txtConPwd);
        if ($pwd == $resSel["password"]) {
            if ($pwdNew == $pwdCon) {
                $str = "update tbl_admin set password='$pwdNew' where admin_id=" . $_SESSION["AdminID"];
                mysqli_query($conn, $str) or die(mysqli_error($conn));
                echo "<script>alert('password change successfully')</script>";
            } else {
                echo "<script>alert('New Password and Confirm Password is not match...')</script>";
            }
        } else {
            echo "<script>alert('current password is not correct.....')</script>";
        }
    }


    ?>

</head>



<body>




    <div class="content-wrapper">
        <div class="content-header mt-5">

            <div class="container-fluid">

                <div class="row d-flex center mb-3">

                    <!-- <h1 style="color:black;">Change Password</h1> -->


                </div>

                <form id="quickForm" class="bg-dark" method="post">
                <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Change Password</h2>
                            </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label >Current Password</label>
                            <input type="Password" name="txtPwd" class="form-control" placeholder="Enter Current Password">
                        </div>
                        <div class="form-group">
                            <label  >New Password</label>
                            <input type="Password" name="txtNewPwd" class="form-control" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label  >Confirm Password</label>
                            <input type="Password" name="txtConPwd" class="form-control" placeholder="Enter Confirm Password">
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary" name="btnSave">Save</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>









</body>

</html>