<?php
session_start();
include('config.php');
if(!isset($_SESSION['admin']))
{
    header("location:auth-login.php");
}
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query_product="SELECT * FROM `tbl_product_image` WHERE `product_id` = $id";
        $result_product = mysqli_query($conn, $query_product);
        while($store1 = mysqli_fetch_array($result_product))
        {
            if(file_exists($store1['main_image']))
            {
                unlink($store1['main_image']);
            }
            if(file_exists($store1['sub_image']))
            {
                unlink($store1['sub_image']);
            }
            
        }

        $query_delete="DELETE FROM `tbl_product` WHERE `tbl_product`.`id` = $id";
        $result_delete = mysqli_query($conn, $query_delete);
        // $query_delete="DELETE FROM `tbl_cart` WHERE `tbl_cart`.`product_id` =  $id";
        // $result_delete = mysqli_query($conn, $query_delete);
        // $query_delete="DELETE FROM `tbl_product_image` WHERE `tbl_product_image`.`product_id` =  $id";
        // $result_delete = mysqli_query($conn, $query_delete);
        // $query_delete="DELETE FROM `tbl_product_size` WHERE `tbl_product_size`.`product_id` =  $id";
        // $result_delete = mysqli_query($conn, $query_delete);
        // $query_delete="DELETE FROM `tbl_review` WHERE `product_id` =  $id";
        // $result_delete = mysqli_query($conn, $query_delete);
        header("location:manage_product.php");
    }
    else
    {
        header("location:manage_product.php");
    }
?>