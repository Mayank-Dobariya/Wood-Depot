
<?php
// require_once "db.php";
$conn = mysqli_connect("localhost", "root", "", "ruper");
$category_id = $_POST["category_id"];
$result = mysqli_query($conn,"SELECT * FROM tbl_category_type where category_id = $category_id");
?>
<option value="">Select category type</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["category_type_name"];?></option>
<?php
}
?>