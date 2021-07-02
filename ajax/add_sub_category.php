<?php
include('config.php');
$id=$_POST['category'];
$query_sub_category="SELECT * FROM `tbl_sub_category` WHERE `category_id` = $id";
$result_sub_category = mysqli_query($conn, $query_sub_category);

?>
<select name="sub_category_id" id="sub_category" class="form-control" required onchange="add_brand_variant()">
<option value="">Select Sub Category Value Only</option>
<?php                                                                     
    while($store = mysqli_fetch_array($result_sub_category))
    {
?>
<option value="<?php echo $store['id'];?>"><?php echo $store['name'];?></option>                                                                        
<?php
    }
?>
</select>