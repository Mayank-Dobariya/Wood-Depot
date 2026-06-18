<?php
 $con = mysqli_connect("localhost", "root", "", "ruper"); die ("connection failed");
 if(isset($_POST['id']))
{
    $id=$_POST['id'];
    
    $str="select * from tbl_category_type where category_id='$id' ";
    $query=mysqli_query($con,$str);
   
    while($row=mysqli_fetch_array($query))
    {
        $id=$row['id'];
        $categorytype=$row['category_type_name'];
        echo "<option value='$id'>$categorytype</option>";
    }
}




?>