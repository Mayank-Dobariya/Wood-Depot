<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include_once 'AdminLink.php';
    include_once 'AdminHome.php';

    ?>

    <style>
        .edit{
            color: green;
            margin-right: 5px;
        }

        .delete{
            margin-right: 5px;
            color: red;
        }
    </style>

</head>

<body>


    <div class="content-wrapper ">
        <div class="content-header mt-5">
            <div class="container-fluid">
                 
                <div class="row d-flex center mb-3">
                     
                        <h1 style="color:black;">CMS Page</h1>
                        <a href="CMSpageadd.php">
                        <button type="button" class="btn btn-primary">Add New</button>
                        </a>
                    
                </div>
                <table class="table bg-white display nowrap" id="example"  style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">SR NO></th>
                            <th scope="col">PACKAGE TITLE</th>
                            <th scope="col">CREATED ON</th>
                            <th scope="col">CREATED BY</th>
                            <th scope="col">MODIFIED ON</th>
                            <th scope="col">MODIFIED BY</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>@fat</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td >Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>@twitter</td>
                            <td>
                                <i class="fa-solid fa-pen-to-square edit"></i>
                                <i class="fa-solid fa-trash delete"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>