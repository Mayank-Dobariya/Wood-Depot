<!DOCTYPE html>

<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once './AdminLink.php';
    include_once 'AdminHome.php';


    ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .err {
            color: red;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }

        #error {
            color: red !important;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }

        #error1 {
            color: red !important;
            display: none;
            letter-spacing: 1px;
            font-weight: 200;
        }
    </style>
</head>

<script type="text/javascript" src="Validation.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 2;
        $("#addButton").click(function() {
            if (counter > 10) {
                alert("Only 10 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('<label style="margin-left:120px;margin-bottom:20px;">Color #' + counter + ' : </label>' +
                '<input type="color" name="txtColor[]" id="textbox' + counter + '" value="" >');
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function() {
            if (counter == 1) {
                alert("No more textbox to remove");
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "categorytype-by-category.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result) {
                    $("#categorytype-dropdown").html(result);
                    // $('#city-dropdown').html('<option value="">Select State First</option>');
                }
            });
        });

    });
</script>
<script type="text/javascript">

</script>





<body>




    <div class="content-wrapper">
        <div class="content-header mt-5">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Add Product </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" class="product_form"  method="POST" enctype="multipart/form-data">
                                <?php
                                // k$conn = mysqli_connect("localhost", "root", "", "ruper");
                                SessionCheck();
                                extract($_REQUEST);
                                if (isset($btnsave)) {
                                    //update product
                                    if (isset($UID)) {
                                        $strUp = "update tbl_product set product_name='$product_name',product_code='$product_code',category_id=$category,category_type_id=$categorytype,price=$price,description='$description',UpdateBy=" . $_SESSION["AdminID"] . " where product_id=" . $UID;
                                        mysqli_query($conn, $strUp) or die(mysqli_error($conn));
                                        // header("location:Productlist.php");
                                    $url = "Productlist.php";
                                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                    } else {
                                        $sql = "SELECT * FROM tbl_product WHERE product_name = '$product_name'";
                                        $result = mysqli_query($conn, $sql);

                                        // Check if category already exists
                                        if (mysqli_num_rows($result) > 0) {

                                            $url = "product.php?err=product already exists in database";
                                            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                            // echo "<p style='color: red;'>{$url}</p>";
                                        } else {



                                            //insert product
                                            $str = "insert into tbl_product values(null,'$product_name','$product_code',$category,$categorytype,$price,'$description'," . $_SESSION["AdminID"] . ",null,1)";
                                            mysqli_query($conn, $str) or die(mysqli_error($conn));

                                            //latest id
                                            $pid = mysqli_insert_id($conn);

                                            // insert product image                                   
                                            if (!empty($_FILES["product_image"]["name"][0])) {
                                                $Def = 1;
                                                foreach ($_FILES["product_image"]["name"] as $key => $filename) {

                                                    // $ImgName = $_FILES["product_image"]["name"];
                                                    $ImgName = "uploads/" . $filename;
                                                    // $Img_Des="uploads/".$ImgName;

                                                    $strInsImg = "insert into tbl_product_image values(null,'$ImgName',$pid,$Def)";
                                                    mysqli_query($conn, $strInsImg) or die(mysqli_error($conn));
                                                    move_uploaded_file($_FILES["product_image"]["tmp_name"]["$key"], "../uploads/$filename");
                                                    $Def = 0;
                                                }
                                            }

                                            //insert product color                                   

                                            foreach ($txtColor as  $value) {
                                                $strColor = "insert into tbl_product_variance values(null,'$value',1,$pid)";
                                                mysqli_query($conn, $strColor) or die(mysqli_error($conn));
                                            }
                                            // header("location:Productlist.php");
                                    $url = "Productlist.php";
                                    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                        }
                                    }

                                    
                                }



                                if (isset($UID)) {
                                    $strSel = "select p.*,c.category,ct.category_type_name from tbl_product p,tblcategory c,tbl_category_type ct where p.category_id=c.id and p.category_type_id=ct.id and product_id=" . $UID;
                                    $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
                                    $resSel = mysqli_fetch_array($rsSel);
                                }
                                // }


                                ?>


                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control pro_name" placeholder="Enter Product Name" value="<?php if (isset($resSel)) echo $resSel["product_name"]; ?>">
                                        <span class="err">Please Enter Product Name</span>
                                        <?php
                                        if(isset($_GET['err']))
                                        {
                                            echo $_GET['err'];
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="text" name="product_code" class="form-control pro_code" placeholder="Enter Product Code" value="<?php if (isset($resSel)) echo $resSel["product_code"]; ?>">
                                        <span class="err">Please Enter Product Code</span>

                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" id="category-dropdown" class="form-select form-control pro_cat" aria-label="Default select example" onchange="findCategoryType(this.value)">
                                            <option>--Select category--</option>
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tblcategory");
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>" <?php if (isset($resSel["category_id"]) == $row["id"]) echo "selected='selected'"; ?>><?php echo $row["category"]; ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <font id="error">Please Select Category</font>
                                        <!-- <span class="err">Please Enter Product </span> -->

                                    </div>
                                    <div class="form-group">
                                        <label>Category Type</label>
                                        <select name="categorytype" id="categorytype-dropdown" class="form-select form-control pro_cat1" aria-label="Default select example">
                                            <option selected>Select Category</option>
                                            <?php
                                            if (isset($resSel)) { ?>
                                                <option selected="" value="<?php echo $resSel["category_type_id"] ?>">
                                                    <?php echo $resSel["category_type_name"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                        <font id="error1">Please Select SubCategory</font>

                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control pro_price" placeholder="Enter Price" value="<?php if (isset($resSel)) echo $resSel["price"]; ?>">
                                        <span class="err">Please Enter Price</span>


                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control pro_description" rows="10"></textarea>
                                        <span class="err">Please Enter Description</span>

                                    </div>
                                    <?php if (!isset($UID)) { ?>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image</label>
                                            <input type="file" multiple="multiple" id="formFile" name="product_image[]" id="field-file" class="form-control field-file pro_file">
                                            <span class="err">Please Select File</span>

                                        </div>


                                        <div class="form-group">
                                            <div id='TextBoxesGroup'>
                                                <div id="TextBoxDiv1">
                                                    <label class="control-label" style="margin-left:120px;margin-bottom:20px;">Color #1 : </label>
                                                    <input type="color" id='textbox1' name="txtColor[]" class="pro_color">

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type='button' value='Add Button' id='addButton' class="pro_color">
                                                    <input type='button' value='Remove Button' id='removeButton' class="pro_color">
                                                    <span class="err">Please Select Two Color</span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" name="btnsave" class="btn btn-primary" value="save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>









            <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.js"></script>

            <!-- PAGE PLUGINS -->
            <!-- jQuery Mapael -->
            <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
            <script src="plugins/raphael/raphael.min.js"></script>
            <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
            <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
            <!-- ChartJS -->
            <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

            <!-- AdminLTE for demo purposes -->
            <!-- <script src="dist/js/demo.js"></script> -->
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="dist/js/pages/dashboard2.js"></script>

            <script src="js/jquery-3.6.0.min.js"></script>

            <script src="js/Admin_velidation.js"></script>






</body>

</html>