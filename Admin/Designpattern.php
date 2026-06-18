<!DOCTYPE html>

<html lang="en">

<head>
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
                                <h2 class="card-title">Add Design Pattern </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pattern Name</label>
                                        <input type="text" name="ProductName" class="form-control" placeholder="Enter Design Pattern Name ">
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