<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
<!DOCTYPE html>
<html  class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ env('APP_NAME') }} | @yield('title')</title>
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="16x16">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="18x18">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="20x20">

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/fontawesome.all.min.css">
        <!--link rel="stylesheet" href="<?php echo $base_url ?>assets/css/nice-select.css"-->
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>style.css?v=one1">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/responsive.css">

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/fontawesome.all.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/animate.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/normalize.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/style.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css-2/responsive.css">

        <style>
            ul.title-ul{
                list-style:disc;
                padding-left:30px;
            }
            ul.title-ul li{
                line-height: 30px;
            }
            .page-area-full p{
                line-height: 35px;
            }
            .page-area-full h3{
                margin-top: 10px;
            }
            .mb-30{
                margin-bottom: 0px;
            }
            .header-top ul {
                margin: 0;
                /*padding: 0;*/
                /*list-style: none;*/
            }
            .header-bottom .menu ul li a {
                color: #333;
                text-decoration: none;
            }
            .header-bottom .menu ul li:hover > a {
                color: #F95537;
            }
            .header-bottom ul{
                margin-bottom: 0px;
                padding-left: 0;
            }
            .breacrumb-content ul li a {
                color: #fff;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <!-- Start Header Area -->
        <header class="header">
            <!-- Header Top -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="top-info">
                                <a class="text-white" style="padding-right: 20px !important;" href="mailto:info@watchdogtitleservices.com">
                                    <span><i class="far fa-envelope"></i> info@watchdogtitleservices.com</span>
                                </a>
                                <span><i class="fas fa-phone-alt"></i> 833-729-6333</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-social">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/WatchDogTitleServices/" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-sm-5 col-4">
                            <div class="logo">
                                <a href="<?php echo $base_url ?>home">
                                    <img class="logo-img-resp" src="<?php echo $base_url ?>assets/img/logo-new (4).png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-7 col-8">
                            <!-- Right -->
                            <div class="header-bottom-right">
                                <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                                </div>
                                <!--div class="top-search">
                                    <div class="header-search-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="header-top-search-form">
                                        <div class="header-top-search-form-full">
                                            <form action="#">
                                                <input type="search" name="search" placeholder="Search Here..">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div-->
                                <div class="top-user">
                                    <div class="user-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="user-list">
                                        <?php if (isset(auth()->user()->id) && !empty(auth()->user()->id)) { ?>
                                            <ul>
                                                <li><a href="{{ URL('user/dashboard') }}">Subscription</a></li>
                                                <li><a href="{{ URL('user/logout') }}">Logout</a></li>
                                            </ul>
                                        <?php } else { ?>
                                            <ul>
                                                <li><a href="{{ URL('/login') }}">Sign In</a></li>
                                                <li><a href="{{ URL('/forgot-password') }}">Forgot Password</a></li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Menu -->
                            <div class="menu">
                                <nav>
                                    <ul>
                                        <li><a href="<?php echo $base_url ?>home">Home</a></li>
                                        <li><a href="<?php echo $base_url ?>title-fraud">What is Title Fraud</a></li>
                                        <li><a href="<?php echo $base_url ?>5-star">5 Star Protection</a></li>
                                        <li><a href="<?php echo $base_url ?>pricing">Pricing</a></li>
                                        <li><a href="<?php echo $base_url ?>contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Area -->
        <!-- Start Mobile Menu Area -->
        <div class="mobile-menu-area">
            <!--offcanvas menu area start-->
            <div class="off_canvars_overlay">
            </div>
            <div class="offcanvas_menu">
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="fas fa-times"></i></a>  
                    </div>
                    <div class="mobile-logo">
                        <a href="<?php echo $base_url ?>home">
                            <img src="<?php echo $base_url ?>assets/img/logo.png" alt="loog">
                        </a>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li><a href="<?php echo $base_url ?>home">Home</a></li>
                            <li><a href="<?php echo $base_url ?>title-fraud">What is Title Fraud</a></li>
                            <li><a href="<?php echo $base_url ?>5-star">5 Star Protection</a></li>
                            <li><a href="<?php echo $base_url ?>pricing">Pricing</a></li>
                            <li><a href="<?php echo $base_url ?>contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--offcanvas menu area end-->

        @yield('content')

        <!-- Start Footer Area -->
        <footer class="pt-140 footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Single -->
                        <div class="col-lg-3 mb-30">
                            <div class="footer-widgets">
                                <div class="footer-logo">
                                    <a href="<?php echo $base_url ?>home">
                                        <img src="<?php echo $base_url ?>assets/img/white-logo.png" alt="logo">
                                    </a>
                                </div>
                                <p>Title Fraud is a billion-dollar problem, and getting worse every day.</p>
                                <div class="footer-social">
                                    <span>
                                        <a href="https://www.facebook.com/WatchDogTitleServices/" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="col-lg-3 mb-30">
                            <div class="footer-widgets">
                                <h3>Usefull Links</h3>
                                <ul>
                                    <li><a href="<?php echo $base_url ?>title-fraud">What is Title Fraud</a></li>
                                    <li><a href="<?php echo $base_url ?>5-star">5 Star Protection</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="<?php echo $base_url ?>pricing">Pricing</a></li>
                                    <li><a href="<?php echo $base_url ?>contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-30 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copy-text">
                                <p>All Rights Reserved &copy; Watch Dog Title Services 2022</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-bottom-menu">
                                <nav>
                                    <ul>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Privacy & Policy</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Area -->
        <div class="scroll-area">
            <i class="fa fa-angle-up"></i>
        </div>


        <!-- Js File -->
        <script src="<?php echo $base_url ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/jquery-3.5.1.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/popper.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/bootstrap.min.js"></script>
        <!--script src="<?php echo $base_url ?>assets/js/jquery.nice-select.min.js"></script-->
        <script src="<?php echo $base_url ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/mixitup.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/wow.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/jquery.waypoints.min.js"></script>
        <script src="<?php echo $base_url ?>assets/js/jquery.counterup.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
        <script src="<?php echo $base_url ?>assets/js/ajax-form.js"></script>
        <script src="<?php echo $base_url ?>assets/js/mobile-menu.js"></script>
        <script src="<?php echo $base_url ?>assets/js/script.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
    </body>
</html>