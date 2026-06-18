<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm password | Depot</title>
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

<body >



    <div class="container">

        <div class="row justify-content-center admin_main">
            <div class="col-auto text-center ">
                <div class="admin_login_main">
                    <div class="admin_login_text">
                        <h1>Update Password</h1>
                    </div>
                    <div class="em-bar">
                        <div class="em_bar_bg">
                        </div>
                    </div>

                    <form class="admin_login_form" id="upassword">


                        <div class="row">

                            <div class="col-12">
                                <input type="password" class="form-control opassword" name="password"
                                    placeholder="New Password">
                                <span class="err">Please Enter Your Password</span>

                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control cpassword" name="cpassword"
                                    placeholder="Confirm Password">
                                    <span class="err">Please Enter Right Password</span>


                            </div>
                        </div>

                        <div class="forget_password post_cat">
                            <a href="./Admin_forget_password.html">Have on account?</a>
                        </div>
                        <div class="form_btn">
                            <input type="submit" class="btn_log" name="update_password" value="Update Password">

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