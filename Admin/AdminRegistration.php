<!DOCTYPE html>
<html lang="en">

<head>

    </script>
    <?php

    include_once "connection.php";
    include_once 'AdminLink.php';
    include_once 'AdminHome.php';

    ?>
    <style>
        .err {
            color: red;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }

        /* form{
        color: white !important;
    } */
    </style>
</head>



<body>
    <?php
    SessionCheck();
    extract($_REQUEST);
    require 'PHPMailer/PHPMailerAutoload.php';
    // require 'connection.php';

    function send_password_reset($txtEmail, $message)
    {
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->IsSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'krupaliman@gmail.com';                 // SMTP username
        $mail->Password = 'irdzodficgwlpvda';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom($mail->Username, 'wood depot');
        $mail->addAddress($txtEmail);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($mail->Username);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "welcome to wood depot as as sub admin";

        $email_template = $message;
        $mail->Body    = $email_template;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }



    if (isset($btnSave)) {

        $sql = "SELECT * FROM tbl_admin WHERE email = '$txtEmail'";
        $result = mysqli_query($conn, $sql);
        if ($result === false) {
            // Handle the error here
            die("Error executing query: " . mysqli_error($conn));
        }

        // Check if category already exists
        if (mysqli_num_rows($result) > 0) {

            $url = "AdminRegistration.php?err=email already exists";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        } else {
            $pwd = base64_encode($txtPwd);
            $fileName = $_FILES["file"]["name"];
            $ImgName = "uploads/" . $fileName;
            if ($_FILES["file"]["error"] > 0) {
                $error = $_FILES["file"]["error"];
            } else {
                // move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/$fileName");	
                move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/' . $fileName);
            }
            if (isset($chkInsert) == 1) {
                $chkInsert = 1;
            } else {
                $chkInsert = 0;
            }
            if (isset($chkUpdate) == 1) {
                $chkUpdate = 1;
            } else {
                $chkUpdate = 0;
            }
            if (isset($chkDelete) == 1) {
                $chkDelete = 1;
            } else {
                $chkDelete = 0;
            }
            $strIns = "insert into tbl_admin values(null,'$txtName','$txtEmail','$pwd','$txtContact','$ImgName',0,'" . $_SESSION["AdminID"] . "',$chkInsert,$chkUpdate,$chkDelete,1)";
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
            $message = "Welcome in Wood depot as a Sub Admin.<br>For Login your<br>Email is : " . $txtEmail . "<br>Password is : " . $txtPwd;
            // mail($txtEmail, 'Your Credential', $message, 'Content-type:text/html;charset=iso-8859-1');
            send_password_reset($txtEmail, $message);
            // header("location:AdminList.php");
            $url = "Adminlist.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }
    ?>


    <div class="content-wrapper">
        <div class="content-header mt-5">
            <div class="container-fluid">
                <div class="row d-flex center mb-3">

                    <!-- <h1 style="color:white;">Admin Registration</h1> -->


                </div>

                <form id="quickForm" class="admin_new_reg bg-dark" method="post" enctype="multipart/form-data">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h2 class="card-title">Registration</h2>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <input type="text" id="txtName" name="txtName" class="form-control arg_name" placeholder="Enter Name">
                                <span class="err">Plese Enter Name</span>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">EmailID</label>
                                <input type="text" id="txtEmail" name="txtEmail" class="form-control arg_email" placeholder="Enter EmailID">
                                <span class="err">Plese Enter Velid Email</span>
                                <?php
                                if (isset($_GET['err'])) {
                                    echo $_GET['err'];
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <input type="Password" name="txtPwd" id="txtPwd" class="form-control arg_pwd" placeholder="Enter Password">
                                <span class="err">Plese Enter Velid Password</span>

                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="Password" id="txtCPwd" name="txtCPwd" class="form-control arg_c_pwd" placeholder="Enter Confirm Password">
                                <span class="err">Please Enter Confirm Password</span>

                            </div>
                            <div class="form-group">
                                <label>Contact No</label>
                                <input type="text" id="txtContact" maxlength="10" name="txtContact" class="form-control arg_phone" placeholder="Enter Contact No">
                                <span class="err">Please Enter Velid Contect No</span>

                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control arg_file" type="file" name="file" id="field-file">
                                <span class="err">Please Select File</span>

                            </div>
                            <label for="formFile" class="form-label">Permission</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chkInsert" id="insert" value="1">
                                <label class="form-check-label" for=insert>Insert</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chkUpdate" id="update" value="1">
                                <label class="form-check-label" for=update>Update </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chkDelete" id="delete" value="1">
                                <label class="form-check-label" for=delete>Delete</label>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="btnSave" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>

    <script src="js/Admin_velidation.js"></script>

</body>


</html>