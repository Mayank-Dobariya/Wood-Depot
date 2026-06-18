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
        <div class="content-header mt-5" >
            <div class="container-fluid">
                <div class="row d-flex center mb-3">
                     
                        <h1 style="color:black;">Design Pattern</h1>
                        <a href="Designpattern.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                        </a>
                    
                </div>
                <table class="table bg-white ">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>