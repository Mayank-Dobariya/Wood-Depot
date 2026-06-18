<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Ruper</title>

    <!-- link -->
    <?php include_once 'link.php';
    include_once 'connection.php';
    extract($_REQUEST);
    if (isset($PID)) {
        $_SESSION["PID"] = $PID;
    }
    if (isset($btnAddToCart)) {
        $string = exec('getmac');
        $mac = substr($string, 0, 17);

        $strSel = "select * from tbl_product where product_id=" . $_SESSION["PID"];
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);

        $strP = "select * from tbl_cart where product_id=" . $_SESSION["PID"];
        $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
        $resP = mysqli_fetch_array($rsP);

        if (mysqli_num_rows($rsP) > 0) {
            $Qty = $resP["quantity"] + 1;
            $x = $Qty * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where user_id=" . $_SESSION["UserID"] . " and product_id=" . $_SESSION["PID"];
            } else {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where mac_address='$mac' and product_id=" . $_SESSION["PID"];
            }
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        } else {
            $x = 1 * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strIns = "insert into tbl_cart values(null," . $_SESSION["UserID"] . "," . $_SESSION["PID"] . ",$rdColor,1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            } else {
                $strIns = "insert into tbl_cart values(null,null," . $_SESSION["PID"] . ",$rdColor,1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            }
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
        }
        $url = "add_to_cart.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";

    ?>
        <script>
            $(document).ready(function() {
                $("#btnCart").click();
            });
        </script>
    <?php
    }
    ?>





    <!-- <link rel="stylesheet" href="./css/mode.css"> -->

    <style>
        .color_1 {
            border: 2px solid black;
        }

        .color_2 {
            border: none;
        }
    </style>
</head>

<body>
    <!-- scroll header and scroll rocket and loader  start------------------ -->
    <div class="scroll_top">
        <i class="fa-solid fa-shuttle-space"></i>
    </div>

    <div class="center-body">

        <div class="loader-square"></div>

    </div>
    <!-- scroll header and scroll rocket and loader  end------------------ -->
    <!-- header start-------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->

    <!-- -----------shop page start--------------------- -->
    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">
        <div class="about_content_parent">

            <div class="about_cotent">
                <h1>Shop</h1>
                <p class="text-center">Home / <a href="#">Shop</a></p>
            </div>
        </div>
    </div>
    <!-- -----------shop page end------------------------ -->


    <!-- --------------------- Products part Start--------------- -->
    <form action="" method="post">

        <div class="spacer_y">
            <div class="container">
                <div class="row g-0">

                    <div class="col-lg-5 col-sm-12">
                        <?php
                        $str = "select p.*,pi.* from tbl_product p,tbl_product_image pi where p.product_id=pi.product_id  and p.product_id=" . $_SESSION["PID"];
                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        while ($res = mysqli_fetch_array($rs)) {
                            $imgName = $res["image_url"];
                        ?>

                            <!-- <img src="<?php echo $imgName; ?>" alt="" srcset="" id="mainimg" class="w-100" > -->
                            <div class="small_img_group  m-auto">

                                <div class="small_img_col">
                                    <img src="<?php echo $imgName; ?>" width=100%; class="small-img" alt="">
                                </div>

                                <div class="small_img_col">
                                    <img src="" width=100%; class="small-img" alt="">
                                </div>


                            </div>
                        <?php }  ?>
                    </div>
                    <?php
                    $STRP = "select p.*,c.category,t.category_type_name from tbl_product p,tblcategory c,tbl_category_type t where p.category_id=c.id and p.category_type_id=t.id and  p.product_id=" . $_SESSION["PID"];
                    $Rsp = mysqli_query($conn, $STRP) or mysqli_error($conn);
                    while ($Resp = mysqli_fetch_array($Rsp)) {
                    ?>

                        <div class="col-lg-7 col-sm-12  p-4">
                            <div class="sub_product_content">
                                <div class="sub_product_head">
                                    <h1><?php echo $Resp["product_name"]; ?></h1>
                                    <?php
                                    $strFeed = "select avg(rating) as rating from tbl_feedback where product_id=" . $_SESSION["PID"];
                                    $rsFeed = mysqli_query($conn, $strFeed) or mysqli_error($conn);
                                    $resFeed = mysqli_fetch_array($rsFeed);
                                    $Val = $resFeed["rating"];
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
                                    <h4><?php echo "&#8377 " . $Resp["price"]; ?></h4>

                                </div>
                                <div class="sub_product_detail">
                                    <h3>Product Detail</h3>
                                    <p>
                                        <?php echo $Resp["description"]; ?>

                                    </p>
                                </div>

                                <div class="product_color d-flex align-items-center">
                                    <h5>COLOR :</h5>
                                    <div class="color"></div>
                                    <?php
                                    $strColor = "select * from tbl_product_variance where is_active=1 and product_id=" . $_SESSION["PID"];
                                    $rsColor = mysqli_query($conn, $strColor) or mysqli_error($conn);
                                    while ($resColor = mysqli_fetch_array($rsColor)) {
                                    ?>


                                        <label class="rad-label">
                                            <input type="radio" class="rad-input  d-block rddiv" name="rad" style="background-color: <?php echo $resColor["product_color"]; ?>" id="<?php echo $resColor["product_variance_id"]; ?>">
                                            <!-- <div class="rad-design"></div> -->
                                        </label>
                                    <?php } ?>
                                    <!-- <label class="rad-label"> -->
                                    <!-- <input type="radio" class="rad-input d-block" name="rad" style="background-color: #4d4d4d;"> -->
                                    <!-- <div class="rad-design"></div> -->
                                    <!-- </label> -->



                                </div>

                                <div class="add_product">


                                    <!------- Add to cart btn start------ -->

                                    <input type="submit" id="btnc" name="btnAddToCart" class="px-3 align-items-center sub_add_cart" role="button" value="ADD TO CART">

                                    <!------- add to cart btn end------ -->
                                    <input type="hidden" id="rdColor" name="rdColor">



                                </div>



                                <a href="inquiry.php?IID=<?php echo $Resp["product_id"] ?>" class="sub_add_product button" value="Inquiry" align="center">Inquiry</a>




                            </div>

                        <?php  }  ?>

                        </div>
                </div>
            </div>
        </div>




    </form>





    <!-- --------------------- Products part End--------------- -->









    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- </div> -->
    <!-- ---------------------Footer Part End--------------- -->
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/cursor_custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#btnc").click(function(e) {
                if ($("#rdColor").val() == "" || ("#rdColor").val() == NULL) {
                    e.preventDefault();
                    alert("select color");
                }
            });

            $(".rddiv").click(function() {
                var color = $(this).attr("id");
                $("#rdColor").val(color);
                $(".rddiv").css('border', 'none');
                var id = '#' + color;
                $(id).css('border', '3px solid #00ff00');

                //alert($("#rdColor").val());
                //alert($(this).attr("id"));

            });
        });
    </script>








</body>

</html>