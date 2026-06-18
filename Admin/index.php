<!DOCTYPE html>
<html lang="en">
<?php
include_once "connection.php";
extract($_REQUEST);
if (isset($login)) {
    $pwd = base64_encode($txtPassword);
    $strsel = "select * from tbl_admin where email='$Email' and Password='$pwd'";
    $rs = mysqli_query($conn, $strsel) or die(mysqli_error($conn));
    if (mysqli_num_rows($rs) > 0) {
        $res = mysqli_fetch_array($rs);
        if ($res["IsActive"] == 1) {

            $_SESSION["AdminID"] = $res["admin_id"];
            $_SESSION["AdminName"] = $res["name"];
            $_SESSION["ImageURL"] = $res["image_url"];
            $_SESSION["IsInsert"]=$res["IsInsert"];
            $_SESSION["IsUpdate"]=$res["IsUpdate"];
            $_SESSION["IsDelete"]=$res["IsDelete"];
            $_SESSION["IsSuper"]=$res["IsSuper"];

            $url = "Dashbord.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        } else {
          echo '<script>alert("you are blocked by admin")</script> ' ;
        }
    } else {
        echo '<script>alert("Invalid username or password")</script> ' ;
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login | Depot</title>
    <!-- bootsrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- slider-->
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/admin_style.css">
    <!-- aenimation custom -->
    <link rel="stylesheet" href="css/aenimation.css">

    <!-- link icon -->
    <link rel="icon" type="image/xicon" href="/img/D Rose_logo.png">

</head>

<body>



    <div class="container">

        <div class="row justify-content-center admin_main">
            <div class="col-auto text-center ">
                <div class="admin_login_main">
                    <div class="admin_login_text">
                        <h1>Admin Login</h1>
                    </div>
                    <div class="em-bar">
                        <div class="em_bar_bg">
                        </div>
                    </div>

                    <form class="admin_login_form" id="admin_log" method="post">


                        <div class="row">
                           

                            <div class="col-12">
                                <input type="text" class="form-control admin_email" name="Email" placeholder="Enter Email">
                                <span class="err">Please Enter Your Email</span>

                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control admin_password" name="txtPassword" placeholder="Enter Password">
                                <span class="err">Please Enter Your Password</span>

                            </div>
                        </div>

                        <div class="forget_password post_cat">
                            <a href="Admin_forget_password.php">Lost Your Password?</a>
                        </div>
                        <div class="form_btn">
                            <input type="submit" class="btn_log" name="login" value="LOGIN">
                        </div>



                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="js/jquery-3.6.1.min.js"></script>

    <script src="js/admin_custom.js"></script>




</body>

</html>