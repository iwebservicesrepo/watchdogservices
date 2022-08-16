<?php
include './db_connection.php';
$urlArr = explode('/', $_SERVER['REQUEST_URI']);
$priceEncoded = end($urlArr);
$price = base64_decode($priceEncoded);
$priceArr = [13, 143, 500];
if (!in_array($price, $priceArr)) {
    $url = $base_url . 'pricing.php';
    header("location:$url");
    exit();
}
$sql = "select * from states";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html  class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Watch Dog - User Information</title>
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
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>


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
                            <!-- Right
                            <div class="header-bottom-right">
                                    <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
                                </div>
                                    <div class="top-search">

                                    </div>
                                    <div class="top-user">
                                            <div class="user-icon">
                                                    <i class="fas fa-user"></i>
                                            </div>
                                            <div class="user-list">
                                                    <ul>
                                                            <li><a href="sign-in.html">Sign In</a></li>
                                                            <li><a href="forget-password.html">Forget Password</a></li>
                                                    </ul>
                                            </div>
                                    </div>
                            </div>
                            -->
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
        <!-- Start Breadcrumb Area -->
        <section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breacrumb-content pt-100 pb-100 text-center">
                            <h2>User Information</h2>
                            <ul>
                                <li><a href="<?php echo $base_url ?>home">Home</a></li>
                                <li>User Information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Area -->

        <!-- Start Payment Form -->
        <section class="pricing-area pt-100 pb-70 section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-50">
                            <p class="text-center">
                                <strong>
                                    Find Out if your home's title has been compromised and get protected immediately to get your free Home Title Scan and Comprehensive Title Report($100 Value FREE)simply complete the form below. <a class="text-info">100% Money Back Guarantee</a>  
                                </strong>
                            </p>
                            <div class="section-title-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-30">
                        <div class="payment-form-single">
                            <form class="form" method="post">
                                <div class="row p-5 py-2">
                                    <h6><i class="fa fa-user"></i> Your Contact Information</h6>
                                </div>
                                <div class="row p-5 py-2">
                                    <div class="col">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname">
                                    </div>
                                    <div class="col">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname">
                                    </div>
                                </div>
                                <div class="row p-5 py-2">
                                    <div class="col">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <hr class="my-5 border-light">
                                <div class="row p-5 py-2">
                                    <h6><i class="fa fa-map-marker"></i> Address to Monitor</h6>
                                </div>
                                <div class="row p-5 py-2">
                                    <div class="col">
                                        <label>Street Addess</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address">
                                    </div>
                                    <div class="col">
                                        <label>Apt Or Unit #</label>
                                        <input type="text" class="form-control" id="apt_unit" name="apt_unit">
                                    </div>
                                </div>
                                <div class="row p-5 py-2">
                                    <div class="col">
                                        <label>City</label>
                                        <input type="text" class="form-control" id="city" name="city">
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <label>State</label>
                                                <select name="state" id="state" class="form-control">
                                                    <option value="" disabled="">Select State</option>
                                                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                                        <option value="<?php echo $row['code'] ?>" <?php if ($row['code'] == 'UT') { ?> selected="" <?php } ?>><?php echo $row['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-5 py-2">
                                    <div class="col text-end">
                                        <input type="hidden" name="price" id="price" value="<?php echo $price ?>">
                                        <input type="submit" name="save_btn" id="save_btn" class="btn btn-info text-white">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Payment Form -->


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
                                    <span><a href="#"><i class="fab fa-facebook-f"></i></a></span>
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
        <script type='text/javascript'>
            $(document).ready(function () {
                $(".form").validate({
                    rules: {
                        fname: {
                            required: true
                        }, lname: {
                            required: true
                        }, email: {
                            required: true,
                            email: true
                        }, phone: {
                            required: true,
                            number: true,
                            minlength: 10,
                            maxlength: 12
                        }, street_address: {
                            required: true
                        }, /*apt_unit: {
                         required: true
                         }, */city: {
                            required: true
                        }, state: {
                            required: true
                        }, zip: {
                            required: true
                        }
                    },
                    messages: {
                        fname: {
                            required: "Please enter first name"
                        }, lname: {
                            required: "Please enter last name"
                        }, email: {
                            required: "Please enter email",
                            email: true
                        }, phone: {
                            required: "Please enter phone",
                            number: "Please enter valid phone",
                            minlength: "Please enter valid phone",
                            maxlength: "Please enter valid phone"
                        }, street_address: {
                            required: "Please enter street address"
                        }, /* apt_unit: {
                         required: "Please enter apartment/unit"
                         },*/ city: {
                            required: "Please enter city"
                        }, state: {
                            required: "Please enter state"
                        }, zip: {
                            required: "Please enter zip"
                        }
                    },
                    errorClass: "help-inline text-danger",
                    errorElement: "span",
                    highlight: function (element, errorClass, validClass) {
                        $(element).parents('.form-group').addClass('has-error');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).parents('.form-group').removeClass('has-error');
                        $(element).parents('.form-group').addClass('has-success');
                    },
                    submitHandler: function (form, e) {
                        e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo $base_url ?>/save_user_info.php",
                            dataType: "json",
                            data: $('form').serialize(),
                            success: function (result) {
                                if (result.url == '') {
                                    Swal.fire({
                                        title: 'Oops!! Something went wrong',
                                        showClass: {
                                            popup: 'animate__animated animate__fadeInDown'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__fadeOutUp'
                                        },
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-danger'
                                        }
                                    });
                                } else {
                                    window.location.href = result.checkout_url;
                                }
                            },
                            error: function (error) {

                            }
                        });
                        return false;
                    }
                });

            });
        </script>
    </body>
</html>