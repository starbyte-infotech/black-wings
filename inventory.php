<?php
session_start();
include('config.php');
if(!isset($_SESSION['email']))
{
    header("location:login.php");
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
    document.getElementById("active_inventory").className = "nav-item active";
</script>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Inventory</a>
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
                  <a class="dropdown-item" href="notification-1.php">Important Update - Surat Suppliers</a>
                  <a class="dropdown-item" href="#">IMP Update regarding HSN</a>
                  <a class="dropdown-item" href="#">Pickup Impact Update - Holi (29th March)</a>
                  <a class="dropdown-item" href="#">Requesting to share your Feedback</a>
                  <a class="dropdown-item" href="#">Metrology (Packaged Commodities) Rules</a>
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
            <div class="col-12 col-md-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">looks_one</i>
                  </div>
                  <p class="card-category">Download file with existing stock

                  </p>
                  <button class="btn btn-primary">Download</button>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">looks_two</i>
                  </div>
                  <p class="card-category">Orders and Order Details</p>
                  <button class="btn btn-primary">Upload</button>
                </div>
                <div class="card-footer">
                  <div class="stats">

                  </div>
                </div>
              </div>
            </div>
           
          </div>

          <ul style="width: fit-content;" class="nav nav-pills mb-3 col mx-auto" id="pills-tab" role="tablist">
            <li class="w-165px nav-item " role="presentation">
              <button class="tab-btn-left active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">In Stock</button>
            </li>
            <li class="w-165px nav-item" role="presentation">
              <button class="tab-btn-right" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Out Of Stock</button>
            </li>
          </ul>


         
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="row card-header card-header-primary">
                      <div class="col-12 col-md-8 p-0 m-0 px-1">
                        <h4 class="card-title">In Stock</h4>
                        <h4 class="card-category">In stock Products on 15th September, 2016</h4>
                      </div>
                      <div class="col-12 col-md-4 ml-auto">
                        <div class="input-group no-border">
                          <input type="text" value="" class="form-control" placeholder="Search...">
                          <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="row px-3">

                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    


                    </div>




                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="row card-header card-header-primary">
                      <div class="col-12 col-md-8 p-0 m-0 px-1">
                        <h4 class="card-title">Out of Stock</h4>
                        <h4 class="card-category">out of stock Products on 15th September, 2016</h4>
                      </div>
                      <div class="col-12 col-md-4 ml-auto">
                        <div class="input-group no-border">
                          <input type="text" value="" class="form-control" placeholder="Search...">
                          <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="row px-3">

                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <div class="card card-stats">
                          <div class="text-left card-header card-header-danger card-header-icon">

                            <h3 class="card-title mt-2">
                              Ultratech Cement
                            </h3>
                            <p class="card-category">Catalog ID: <span>4247803</span></p>
                          </div>

                          <div class="card-footer">
                            <div class="stats">
                              <div class="row my-2 text-center">

                                <div class="col-12 col-xl-2 mx-auto">
                                  <img src="images/c-1.png" width="80px" alt="">
                                </div>
                                <div class="col-12 col-xl-5 text-left my-xs-3 px-5">
                                  <h5 class="mb-2">Ultratech Cement</h5>
                                  <h5 class="mb-2"> Catalog ID:  <span>4247803</span></h5>
                                  <h5 class="mb-2"> No of Designs:  <span>4</span></h5>
                                  <h5 class="mb-2"> Pending Orders:  <span>0</span></h5>
                                  <h5 class="mb-2"> Category: Sarees</h5>
                                  <div>This catalog is not live yet. It will be made live on.: <span>05 Apr, 2021 04:46 PM</span> </div>
                                </div>
                                <div class="col-12 col-xl-5  mx-auto">
                                  <button class="btn btn-primary">UPDATE INVENTORY</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>





                    </div>




                  </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
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
  <script>
    $(document).ready(function () {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>