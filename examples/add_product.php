<?php
session_start();
include('config.php');
if(!isset($_SESSION['admin']))
{
    // header("location:auth-login.php");
}
$query_category="SELECT * FROM `tbl_category`";
$result_category = mysqli_query($conn, $query_category);

// $query_color="SELECT * FROM `tbl_color`";
// $result_color = mysqli_query($conn, $query_color);

// $query_size="SELECT * FROM `tbl_size`";
// $result_size = mysqli_query($conn, $query_size);


$query_duration="SELECT * FROM `tbl_duration`";
$result_duration = mysqli_query($conn, $query_duration);

if(isset($_POST['submit']))
{
    function imageResize($imageSrc,$imageWidth,$imageHeight) 
    {

        $newImageWidth =1000;
        $newImageHeight =1358;
    
        $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
        imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
        return $newImageLayer;
    }
    function imageResizeSub($imageSrc,$imageWidth,$imageHeight) 
    {

        $newImageWidth =555;
        $newImageHeight =754;
    
        $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
        imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
        return $newImageLayer;
    }

    $name=$_POST['name'];
    $detail=$_POST['detail'];
    $benefits=$_POST['benefits'];
    $usages=$_POST['usages'];
    $mrp=$_POST['mrp'];
    $sale_price=$_POST['sale_price'];
    $sale_price1=$mrp;
    if(!empty($sale_price) && !empty($_POST['mrp']))
        $sale_price1=$mrp-(($mrp*$sale_price)/100);
    $cgst=$_POST['cgst'];
    $sgst=$_POST['sgst'];
    $igst=$_POST['igst'];
    $return_time=$_POST['return_time'];
    $return_time_select=$_POST['return_time_select'];
    $delivery_time=$_POST['delivery_time'];
    $category_id=$_POST['category_id'];
    $link=$_POST['link'];
    $star=$_POST['star'];
    $customer=$_POST['customer'];
    $status = 'Pending';

    $query_search="SELECT * FROM tbl_product ORDER BY id DESC LIMIT 1";
    $result_search = mysqli_query($conn, $query_search);
    $store_search = mysqli_fetch_array($result_search);
    $no=$store_search['id']+1;
    mysqli_autocommit($conn,FALSE);

    $query_insert="INSERT INTO `tbl_product` (`id`, `name`, `detail`, `benefits`, `usages`, `MRP`, `sale_price`,`sale_price1`, `CGST`, `SGST`, `IGST`,
    `return_time`, `delivery_time`, `category_id`,`credit`,`link`,`star`,`customer`, `created_at`,`status`) 
    VALUES ('$no', '$name', '$detail', '$benefits', '$usages', '$mrp', '$sale_price','$sale_price1', '$cgst', '$sgst', '$igst', '$return_time $return_time_select', 
    '$delivery_time', '$category_id',  '0','$link','$star','$customer', current_timestamp(),'$status')";
    $result1 = mysqli_query($conn, $query_insert);
    if($result1)
    {
        $column_count=$_POST['column_count'];
        for ($x = 1; $x <=$column_count; $x++) 
        {
          $column_name=$_POST['column_name'.$x];
          $detail=$_POST['detail'.$x];
          $query_detail_insert="INSERT INTO `tbl_product_detail` (`id`, `column_name`, `detail`, `product_id`) VALUES (NULL, 
          '$column_name', '$detail', $no);";
          $result_detail_insert = mysqli_query($conn, $query_detail_insert);
          
        }
        $image_count=$_POST['image_count'];
        for ($x = 1; $x <=$image_count; $x++) 
        {
            if(isset($_FILES['main_image'.$x]))
            {
                $f=$_FILES['main_image'.$x];
                $f2=$_FILES['sub_image'.$x];
                if(!empty($f["name"]) || !empty($f2["name"]))
                {
                    if(empty($f["name"]))
                    {
                        $path_main="";
                    }
                    else
                    {
                        $uploadedFile = $f['tmp_name']; 
                        $sourceProperties = getimagesize($uploadedFile);
                        $newFileName = time();
                        $dirPath = "image/products/";
                        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
                        $imageType = $sourceProperties[2];
                        $x1=$x+1;
                        $newFileName.=$f['name'];
                        switch ($imageType) 
                        {
                            case IMAGETYPE_PNG:
                                $imageSrc = imagecreatefrompng($uploadedFile); 
                                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagepng($tmp,$dirPath.$x1. $newFileName);
                                $path_main="image/products/".$x1.$newFileName;
                                break;           
                
                            case IMAGETYPE_JPEG:
                                $imageSrc = imagecreatefromjpeg($uploadedFile); 
                                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagejpeg($tmp,$dirPath. $x1.$newFileName);
                                $path_main="image/products/".$x1.$newFileName;
                                break;
                            
                            case IMAGETYPE_GIF:
                                $imageSrc = imagecreatefromgif($uploadedFile); 
                                $tmp = imageResize($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagegif($tmp,$dirPath.$x1. $newFileName);
                                $path_main="image/products/".$x1.$newFileName;
                                break;
                
                            default:
                                // echo '<script type="text/javascript">alert("Invalid Image type of Zoom Main ' . $x . '");</script>';
                                $error="Invalid Image type of Zoom Main $x";
                                $path_main="";
                                break;
                        }
                        
                        
                    }
                    $f2=$_FILES['sub_image'.$x];
                    if(empty($f2["name"]))
                    {
                        $path_sub="";
                    }
                    else
                    {
                        $uploadedFile = $f2['tmp_name']; 
                        $sourceProperties = getimagesize($uploadedFile);
                        $newFileName = time();
                        $dirPath = "image/products/";
                        $ext = pathinfo($f2['name'], PATHINFO_EXTENSION);
                        $imageType = $sourceProperties[2];
                        $x1=$x+2;
                        $newFileName.=$f2['name'];
                        switch ($imageType) 
                        {
                            case IMAGETYPE_PNG:
                                $imageSrc = imagecreatefrompng($uploadedFile); 
                                $tmp = imageResizeSub($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagepng($tmp,$dirPath.$x1. $newFileName);
                                $path_sub="image/products/".$x1.$newFileName;
                                break;           
                
                            case IMAGETYPE_JPEG:
                                $imageSrc = imagecreatefromjpeg($uploadedFile); 
                                $tmp = imageResizeSub($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagejpeg($tmp,$dirPath. $x1.$newFileName);
                                $path_sub="image/products/".$x1.$newFileName;
                                break;
                            
                            case IMAGETYPE_GIF:
                                $imageSrc = imagecreatefromgif($uploadedFile); 
                                $tmp = imageResizeSub($imageSrc,$sourceProperties[0],$sourceProperties[1]);
                                imagegif($tmp,$dirPath.$x1. $newFileName);
                                $path_sub="image/products/".$x1.$newFileName;
                                break;
                
                            default:
                                // echo '<script type="text/javascript">alert("Invalid Image type of Zoom Out Sub ' . $x . '");</script>';
                                $path_sub="";
                                $error="Invalid Image type of Zoom Out Sub $x";
                                break;
                        }
                        
                      
                    }  
                    if(!empty($path_main) || !empty($path_sub))
                    {
                        $query_image_insert="INSERT INTO `tbl_product_image` (`id`, `main_image`, `sub_image`, `product_id`) VALUES (NULL, 
                        '$path_main', '$path_sub', $no);";
                        $result_image_insert = mysqli_query($conn, $query_image_insert);
                    }                   
                }               
            }            
        }
        if(isset($error))
        {
            mysqli_rollback($conn);
            mysqli_close($conn);
        }
        else
        {
            mysqli_commit($conn);
            // header("location:add_product.php");
        }        
    }
    else
    {
        $error="Something Went Wrong!!";
    }
}
?>
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
        <?php
            include("sidemenu.php");
        ?>
        <script>
            document.getElementById("active_addproduct").className = "nav-item active";
        </script>
    </div>
    
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-header card-header-primary">
                            <div class="col-12 col-md-8 p-0 m-0 px-1">
                                <h4 class="card-title">Add Product Detail </h4>
                                <h4 class="card-category"></h4>
                            </div>
                        </div>

                        <div class="card-body">
                          <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-body">
                                  <div class="row">
                                      <div class="col-md-3"><label>Rating Stars :</label></div>
                                      <div class="col-md-3">
                                          <div class="form-group ">
                                              <input type="number" class="form-control" name="star" min=0 max=5 placeholder="Number Of star">
                                          </div>
                                      </div>
                                      <div class="form-check form-switch col-md-4">
                                          <input type="number" class="form-control" min=0 name="customer"  placeholder="Number Of Happy Customer">
                                      </div>
                                      <div class="col-md-2">                                                
                                      </div>
                                      <div class="col-md-3"><label>Product title :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="text" class="form-control" placeholder="Name" id="first-name-icon" name="name" 
                                                  value="<?php if(isset($_POST['name'])) echo $_POST['name']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Detail :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <textarea name="detail" class="form-control" cols="30" rows="3" placeholder="Details"><?php if(isset($_POST['detail'])) echo $_POST['detail']?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Benefits :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <textarea name="benefits" class="form-control" cols="30" rows="3" placeholder="Benefits"><?php if(isset($_POST['benefits'])) echo $_POST['benefits']?></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-3"><label>Usages :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <textarea name="usages" class="form-control" cols="30" rows="3" placeholder="usages"><?php if(isset($_POST['usages'])) echo $_POST['usages']?></textarea>
                                              </div>
                                          </div>
                                      </div> 
                                      <div id="column" class="row col-md-12">
                                        
                                      </div>
                                      <input type="text" id="column_count" name="column_count" value="0" hidden>
                                      <div class="col-12 d-flex justify-content-center ">
                                              <button type="button" name="button" onclick="addCode1()" class="btn btn-secondary">+ Add Column And More Detail </button>
                                      </div>
                                      <script>
                                          function addCode1() {
                                              var number=document.getElementById('column_count').value;
                                              number=parseInt(number);
                                              // alert(number);
                                              number=number+1;
                                              document.getElementById('column_count').value=number;
                                              document.getElementById("column").insertAdjacentHTML("beforeend", 
                                              " <div class='col-md-3'><input type='text' class='form-control' name='column_name"+number+"' placeholder='Column Name "+number+"' value='<?php if(isset($_POST['column_name"+number+"'])) echo $_POST['column_name"+number+"']?>'></div><div class='col-md-9'> <div class='form-group '><div class='position-relative'><input type='text' class='form-control' name='detail"+number+"' placeholder='Details Related To column Name' value='<?php if(isset($_POST['detail"+number+"'])) echo $_POST['detail"+number+"']?>'></div></div></div>");
                                          }
                                      </script>
                                      <div class="col-md-3"><label>MRP :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                              <input type="number" step="0.0001" class="form-control" name="mrp" min=0 value="<?php if(isset($_POST['mrp'])) echo $_POST['mrp']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Sale Discount (in %) :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                              <input type="number" step="0.0001" class="form-control" name="sale_price" min=0 max=100 value="<?php if(isset($_POST['sale_price'])) echo $_POST['sale_price']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>CGST (in %) :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="number" step="0.0001" class="form-control" name="cgst" min=0 max=100 value="<?php if(isset($_POST['cgst'])) echo $_POST['cgst']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>SGST (in %) :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="number" step="0.0001" class="form-control" name="sgst" min=0 max=100 value="<?php if(isset($_POST['sgst'])) echo $_POST['sgst']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>IGST (in % ) :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="number" step="0.0001" class="form-control" name="igst" min=0 max=100 value="<?php if(isset($_POST['igst'])) echo $_POST['igst']?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Return time :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group row">
                                              <div class="col-sm-3">
                                                      <input type="number" class="form-control" name="return_time" min=0 max=100 value="<?php if(isset($_POST['return_time'])) echo $_POST['return_time']?>">
                                              </div>    
                                                  <div class="col-sm-9">
                                                      <select name="return_time_select" class="form-control" >
                                                          <option value="">Select Value Only</option>
                                                          <?php    
                                                              while($store = mysqli_fetch_array($result_duration))
                                                              {
                                                                  
                                                          ?>
                                                          <option value="<?php echo $store['name'];?>"><?php echo $store['name'];?></option>                                                                        
                                                          <?php
                                                              }
                                                          ?>
                                                      </select>
                                                  </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Delivery time :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="text" class="form-control" name="delivery_time">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-3"><label>Youtube Link :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                                  <input type="text" class="form-control" name="link">
                                              </div>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-3"><label>Select Category :</label></div>
                                      <div class="col-md-9">
                                          <div class="form-group ">
                                              <div class="position-relative">
                                              <select name="category_id" class="form-control" >
                                                          <option value="">Select Category Value Only</option>
                                                          <?php                                                                     
                                                              while($store = mysqli_fetch_array($result_category))
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
                                      
                                      <div id="myList" class="row ">
                                          <div class="col-md-3"><label>Zoom Main Image 1: </label></div>
                                          <div class="col-md-9">
                                              <input type="file"  class="form-control" name="main_image1" accept="image/*">
                                              
                                          </div>
                                          <div class="col-md-3"><label>Zoom Out Sub Image 1: </label></div>
                                          <div class="col-md-9">
                                          <input type="file"  class="form-control" name="sub_image1" id="sub_image1" accept="image/*">

                                          </div>
                                          <input type="text" hidden class="form-control" id="1" name="1">
                                      </div>
                                      <input type="text" id="image_count" name="image_count" value="1" hidden>
                                      <div class="col-12 d-flex justify-content-center mb-5">
                                              <button type="button" name="button" onclick="addCode()" class="btn btn-secondary">+ Add image </button>
                                      </div>
                                      <hr>
                                      <div class="col-12 d-flex justify-content-center">                                                   
                                          <button type="submit" class="btn btn-primary me-1 mb-1" name="submit">Save Changes</button>
                                          <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          <script>
                                  function addCode() {
                                      var number=document.getElementById('image_count').value;
                                      number=parseInt(number);
                                      // alert(number);
                                      number=number+1;
                                      document.getElementById('image_count').value=number;
                                      document.getElementById("myList").insertAdjacentHTML("beforeend", 
                                      " <div class='col-md-3'><label>Zoom Main Image "+number+": </label></div><div class='col-md-9'><input type='file' class='form-control' name='main_image"+number+"' accept='image/*'></div><div class='col-md-3'><label>Zoom Out Sub Image "+number+": </label></div><div class='col-md-9'><input type='file' class='form-control' name='sub_image"+number+"' id='sub_image"+number+"' accept='image/*'></div><input type='text' hidden class='form-control' id='"+number+"' name='"+number+"'>");
                                  }
                          </script>
                          </div>


                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>


    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function () {
      $().ready(function () {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function (event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function () {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function () {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function () {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function () {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function () {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function () {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function () {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function () {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function () {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function () {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>