<!DOCTYPE html>

<html lang="en">

<head>
    <!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script> -->
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
                newTextBoxDiv.after().html('<label style="margin-left:120px;margin-bottom:20px;">Color #' + counter + ' : </label>  ' +
                    '  <input type="color" name="txtColor[]" id="textbox' + counter + '" value="" >');
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
        });
    </script>
    <?php

    include_once './AdminLink.php';
    include_once 'AdminHome.php';

    ?>

</head>



<body>




    <div class="content-wrapper bg-white">
        <div class="content-header mt-5">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h2 class="card-title">Add CMS </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Page Title</label>
                                        <input type="text" name="PakagetName" class="form-control" placeholder="Enter Page Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input type="text" name="ProductCode" class="form-control" placeholder="Enter Short Description">
                                    </div>

                                   
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Long Description</label>
                                        <textarea class="form-control" rows="10"></textarea>
                                    </div>

                                    

                                   
                                    

                                    

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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

</body>

</html>