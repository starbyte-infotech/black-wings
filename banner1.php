<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
    header("location:login.php");
}
$banner_id=1;
if(isset($_POST['submit_banner']))
{
    $banner_title=$_POST['banner_title'];
    $banner_status=0;
    if(isset($_POST['banner_status']))
        $banner_status=1;
    $query_update="UPDATE `tbl_banner` SET `title` = '$banner_title', `status` = '$banner_status' WHERE `tbl_banner`.`id` = $banner_id";
    $result_update = mysqli_query($conn, $query_update);
}
?>
<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Black Wing (https://www.creative-tim.com)
Coded by Black Wing

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard by Black Wing
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php
        include("sidemenu.php");
    ?>
    <script>
        document.getElementById("active_banner1").className = "nav-item active";
    </script>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Payment</a>
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
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Log out</a>
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
                                        <h4 class="card-title">Add Banner Detail </h4>
                                        <h4 class="card-category"></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                <?php
                                    $query_banner="SELECT * FROM `tbl_banner` WHERE `id` = $banner_id";
                                    $result_banner = mysqli_query($conn, $query_banner);
                                    $store_banner = mysqli_fetch_array($result_banner);
                                ?>
                                <div class="card-header"> 
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-2"><label>Banner 1 Title</label></div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <input type="text" class="form-control" name="banner_title" value="<?php echo $store_banner['title'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-check form-switch col-md-3">
                                                <!-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="checked" <?php if(!empty($store_banner['status'])) echo "checked" ?> name="banner_status"/> -->
                                                <input class="" type="checkbox" id="flexSwitchCheckChecked" value="checked" <?php if(!empty($store_banner['status'])) echo "checked" ?> name="banner_status"/>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Display This Banner Or Not?</label>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary me-1 mb-1" name="submit_banner">Save Changes</button>
                                            </div>
                                        </div>  
                                    </form>                          
                                </div>


                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class=" text-primary">
                                                <th>
                                                    No
                                                </th>
                                                <th>
                                                    Sub Order Num
                                                </th>
                                                <th>
                                                    Order Num
                                                </th>
                                                <th>
                                                    Sub Order Contribution
                                                </th>
                                                <th>
                                                    Amount
                                                </th>
                                                <th>
                                                    Penalty
                                                </th>
                                                <th>
                                                    Return Shipping Fee
                                                </th>
                                                <th>
                                                    Waiver/Compensation
                                                </th>
                                                <th>
                                                    Net Amount
                                                </th>
                                                <th>
                                                    View Details
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        642795373_1
                                                    </td>
                                                    <td>
                                                        642795373
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target=".bd-example-modal-lg"
                                                            href=""><i class="material-icons">more_horiz</i></a>
                                                    </td>

                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">

                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-heading text-center"
                                                                        id="exampleModalLabel">
                                                                        Overall Order Details</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="container-fluid">

                                                                    <div class="row mt-3">
                                                                        <div class="col-12 text-center my-3">
                                                                            <div class="modal-heading"> ultratech <span
                                                                                    class="text-warning f-w-400"> Cement
                                                                                </span></div>
                                                                        </div>

                                                                        <div class="col-12 col-xl-2">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">product</h4>

                                                                                </div>
                                                                                <img class="my-3 mx-auto p-4"
                                                                                    width="170px" src="images/c-1.png"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-xl-7 mb-5">

                                                                            <div class="row">
                                                                                <div class="col-12 col-xl-6">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Order
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3">
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sub
                                                                                                    Order Num</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    642795373_1</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Quantity</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    1
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    SKU
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    R
                                                                                                    AVADH DVD</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    HSN
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    5007</div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-xl-6 ">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Sale
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3 ">
                                                                                                <div class="col-12">
                                                                                                    <h6>Total Revenue
                                                                                                        (Incl.
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sale Revenue</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Revenue
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    85</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sales Returns</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Returns
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Marketplace Fee
                                                                                                        (Inc
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Commission</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Charge
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Return Shipping
                                                                                                    Charge</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Compensation/Recovery
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Compensation (No
                                                                                                    GST)</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Net Settlement
                                                                                                        (Inc GST)
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Bank Settlemen</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    390</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    GST
                                                                                                    input credits</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    18</div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        <div class="col-12  col-xl-3">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">Address</h4>

                                                                                </div>
                                                                                <div class="card-body table-responsive">
                                                                                    <div class="mt-3">Bristi Saha</div>
                                                                                    <div>Akash Saha</div>
                                                                                    <div>Shyamnagar</div>
                                                                                    <div>Kolabagan Mondir</div>
                                                                                    <div>West Bengal(743127)</div>

                                                                                </div>
                                                                            </div>
                                                                        </div>






                                                                    </div>

                                                                    <div class="track mx-auto p-0 col-12 ">
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Ordered</span> </span>
                                                                            <span class="text">02 Feb,
                                                                                2021</span>
                                                                        </div>
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Shipped</span></span>
                                                                            <span class="text"> 05 Feb,
                                                                                2021</span>
                                                                            <span class="text"> 908.41</span>
                                                                        </div>
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Delivered</span> </span>
                                                                            <span class="text"> 09 Feb, 2021
                                                                            </span>
                                                                            <span class="text">Return
                                                                            </span>
                                                                        </div>
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Returned</span>  </span>
                                                                                    <span class="text"> 10 Feb,
                                                                                        2021 </span>
                                                                                    <span class="text"> -1028.41 </span>
                                                                                </div>
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Payment (Paid)</span> </span>
                                                                            <span class="text"> 01 Mar, 2021
                                                                            </span>
                                                                            <span class="text">-120.00006
                                                                            </span>
                                                                        </div>
                                                                        <div class="step active"> <span class="icon">   <span class="tooltiptext">Compensation</span>  </span>
                                                                            <span class="text"> 01 Apr, 2021
                                                                            </span>
                                                                            <span class="text"> 908.41
                                                                            </span>
                                                                        </div>
                                                                        <div class="step"> <span class="icon">   <span class="tooltiptext">Payment (Pending)</span>  </span>
                                                                            <span class="text">02 Apr,
                                                                                2021</span>
                                                                            <span class="text">908.41</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        2
                                                    </td>
                                                    <td>
                                                        642795373_1
                                                    </td>
                                                    <td>
                                                        642795373
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target=".bd-example-modal-lg"
                                                            href=""><i class="material-icons">more_horiz</i></a>
                                                    </td>

                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">

                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-heading text-center"
                                                                        id="exampleModalLabel">
                                                                        Overall Order Details</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="container-fluid">

                                                                    <div class="row mt-3">
                                                                        <div class="col-12 text-center my-3">
                                                                            <div class="modal-heading"> ultratech <span
                                                                                    class="text-warning f-w-400"> Cement
                                                                                </span></div>
                                                                        </div>

                                                                        <div class="col-2">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">product</h4>

                                                                                </div>
                                                                                <img class="my-3 mx-auto p-4"
                                                                                    width="170px" src="images/c-1.png"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-7 mb-5">

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Order
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3">
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sub
                                                                                                    Order Num</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    642795373_1</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Quantity</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    1
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    SKU
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    R
                                                                                                    AVADH DVD</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    HSN
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    5007</div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Sale
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3 ">
                                                                                                <div class="col-12">
                                                                                                    <h6>Total Revenue
                                                                                                        (Incl.
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sale Revenue</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Revenue
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    85</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sales Returns</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Returns
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Marketplace Fee
                                                                                                        (Inc
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Commission</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Charge
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Return Shipping
                                                                                                    Charge</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Compensation/Recovery
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Compensation (No
                                                                                                    GST)</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Net Settlement
                                                                                                        (Inc GST)
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Bank Settlemen</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    390</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    GST
                                                                                                    input credits</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    18</div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        <div class="col-3">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">Address</h4>

                                                                                </div>
                                                                                <div class="card-body table-responsive">
                                                                                    <div class="mt-3">Bristi Saha</div>
                                                                                    <div>Akash Saha</div>
                                                                                    <div>Shyamnagar</div>
                                                                                    <div>Kolabagan Mondir</div>
                                                                                    <div>West Bengal(743127)</div>

                                                                                </div>
                                                                            </div>
                                                                        </div>






                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3
                                                    </td>
                                                    <td>
                                                        642795373_1
                                                    </td>
                                                    <td>
                                                        642795373
                                                    </td>
                                                    <td>

                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td class="text-primary ">
                                                        ???350
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target=".bd-example-modal-lg"
                                                            href=""><i class="material-icons">more_horiz</i></a>
                                                    </td>

                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1"
                                                        role="dialog" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">

                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-heading text-center"
                                                                        id="exampleModalLabel">
                                                                        Overall Order Details</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="container-fluid">



                                                                    <div class="row mt-3">
                                                                        <div class="col-12 text-center my-3">
                                                                            <div class="modal-heading"> ultratech Ambuja
                                                                                <span class="text-warning f-w-400">
                                                                                    Cement
                                                                                </span></div>
                                                                        </div>

                                                                        <div class="col-2">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">product</h4>

                                                                                </div>
                                                                                <img class="my-3 mx-auto p-4"
                                                                                    width="170px" src="images/c-1.png"
                                                                                    alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-7 mb-5">

                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Order
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3">
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sub
                                                                                                    Order Num</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    642795373_1</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Quantity</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    1
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    SKU
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    R
                                                                                                    AVADH DVD</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    HSN
                                                                                                    Code</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    5007</div>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="card">
                                                                                        <div
                                                                                            class="card-header card-header-warning">
                                                                                            <h4 class="card-title">Sale
                                                                                                Details</h4>

                                                                                        </div>
                                                                                        <div
                                                                                            class="card-body table-responsive">

                                                                                            <div class="row mt-3 ">
                                                                                                <div class="col-12">
                                                                                                    <h6>Total Revenue
                                                                                                        (Incl.
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sale Revenue</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Revenue
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    85</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Sales Returns</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -350</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Returns
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Marketplace Fee
                                                                                                        (Inc
                                                                                                        GST)</h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Commission</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Shipping Charge
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    0</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Return Shipping
                                                                                                    Charge</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    -85</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Compensation/Recovery
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Compensation (No
                                                                                                    GST)</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    350</div>

                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-12 mt-2">
                                                                                                    <h6>Net Settlement
                                                                                                        (Inc GST)
                                                                                                    </h6>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    Bank Settlemen</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    390</div>
                                                                                                <div
                                                                                                    class="col-6 text-left">
                                                                                                    GST
                                                                                                    input credits</div>
                                                                                                <div
                                                                                                    class="col-6 text-right">
                                                                                                    ???
                                                                                                    18</div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        <div class="col-3">

                                                                            <div class="card">
                                                                                <div
                                                                                    class="card-header card-header-warning">
                                                                                    <h4 class="card-title ">Address</h4>

                                                                                </div>
                                                                                <div class="card-body table-responsive">
                                                                                    <div class="mt-3">Bristi Saha</div>
                                                                                    <div>Akash Saha</div>
                                                                                    <div>Shyamnagar</div>
                                                                                    <div>Kolabagan Mondir</div>
                                                                                    <div>West Bengal(743127)</div>

                                                                                </div>
                                                                            </div>
                                                                        </div>








                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
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
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
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