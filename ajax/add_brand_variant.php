<?php
include('config.php');
$id=$_POST['sub_category'];
$query_brand="SELECT * FROM `tbl_brand` WHERE `sub_category_id` = $id";
$result_brand = mysqli_query($conn, $query_brand);

$id=$_POST['sub_category'];
$query_variant="SELECT * FROM `tbl_variant` WHERE `sub_category_id` = $id";
$result_variant = mysqli_query($conn, $query_variant);

?>
<div class="col-md-12 row" id="brand_variant">
<div class="col-md-3"><label>Select Brand :</label></div>
<div class="col-md-9">
    <div class="form-group ">
        <div class="position-relative">
        <select name="brand_id" id="brand" class="form-control" >
            <option value="">Select Brand Value Only</option>                                                         
            <?php                                                                     
                while($store = mysqli_fetch_array($result_brand))
                {
            ?>
            <option value="<?php echo $store['id'];?>"><?php echo $store['name'];?></option>                                                                        
            <?php
                }
            ?>
        </select>
        </div>
    </div>
</div>
<div class="col-md-3"><label>Select Variant :</label></div>
<div class="col-md-9">
    <div class="form-group ">
        <div class="position-relative">
        <select name="variant_id" id="variant" class="form-control" >
            <option value="">Select Variant Value Only</option>    
            <?php                                                                     
                while($store = mysqli_fetch_array($result_variant))
                {
            ?>
            <option value="<?php echo $store['id'];?>"><?php echo $store['name'];?></option>                                                                        
            <?php
                }
            ?>                                                     
        </select>
        </div>
    </div>
</div>
</div>