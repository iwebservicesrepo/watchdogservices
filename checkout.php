<?php
include './db_connection.php';
$urlArr = explode('/', $_SERVER['REQUEST_URI']);
$userEncodedId = end($urlArr);
$user_id = base64_decode($userEncodedId);
$sql = "select * from users where id = '" . $user_id . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html  class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Watch Dog - Title Services</title>
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="16x16">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="18x18">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="20x20">

        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/bootstrap-icons.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/fontawesome.all.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/nice-select.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo $base_url ?>style.css?v=one1">
        <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/responsive.css">
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
        <!-- Start Breadcrumb Area -->
        <section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breacrumb-content pt-100 pb-100 text-center">
                            <h2>Checkout</h2>
                            <ul>
                                <li><a href="<?php echo $base_url ?>home">Home</a></li>
                                <li>Checkout</li>
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
                    <div class="col-lg-12 col-md-12 mb-30">
                        <div class="payment-form-single">
                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
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
        <script src="<?php echo $base_url ?>assets/js/jquery.nice-select.min.js"></script>
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
        <!-- test details -->
        <!--script src="https://www.paypal.com/sdk/js?client-id=AduM3JCbaGxXBOM2ZOqei3pBM8lFIHnIVilMnjA790dNHNyE-9mA8O9JsFNFDLdocP5RhorPXQviA-1p&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script-->
        <!-- live details -->
        <script src="https://www.paypal.com/sdk/js?client-id=AQJOFV2wKzFJi1snAP_27KTsvpaqkDHod6LYudaM-iFTjmDOwAdKYimdU3i-fTL0gYK937Lo7I3AVZvc&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
        <script>
            function initPayPalButton() {
                paypal.Buttons({
                    style: {
                        shape: 'rect',
                        color: 'gold',
                        layout: 'vertical',
                        label: 'paypal',
                    },
                    createOrder: function (data, actions) {
                        return actions.order.create({
                            payer: {
                                birth_date: '2021-01-01',
                                email_address: '<?php echo $row["email"] ?>',
                                phone: {
                                    phone_number: {
                                        national_number: '<?php echo $row["phone"] ?>',
                                    }
                                },
                                name: {
                                    given_name: '<?php echo $row["first_name"] . " " . $row["last_name"] ?>',
                                    surname: '<?php echo $row["last_name"] ?>',
                                },
                                address: {
                                    address_line_1: '<?php echo $row["street_address"] ?>',
                                    address_line_2: '<?php echo $row["apt_unit"] ?>',
                                    admin_area_2: '<?php echo $row["city"] ?>',
                                    admin_area_1: '<?php echo $row["state"] ?>',
                                    postal_code: '<?php echo $row["zip"] ?>',
                                    country_code: 'US',
                                },
                            },
                            purchase_units: [{"amount": {"currency_code": "USD", "value": '<?php echo $row["price"] ?>'}}]
                        });
                    },
                    onApprove: function (data, actions) {
                        return actions.order.capture().then(function (orderData) {
                            var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
                            if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                                return actions.restart(); // Recoverable state, per:
                                // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                            }

                            if (errorDetail) {
                                var msg = 'Sorry, your transaction could not be processed.';
                                if (errorDetail.description)
                                    msg += '\n\n' + errorDetail.description;
                                if (orderData.debug_id)
                                    msg += ' (' + orderData.debug_id + ')';
                                Swal.fire({
                                    title: msg,
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
                                $.ajax({
                                    type: 'POST',
                                    url: "<?php echo $base_url ?>/save_payment_info.php",
                                    dataType: "json",
                                    data: {data: orderData, 'user_id': "<?php echo $user_id ?>"},
                                    success: function (result) {
                                        if (result.success == false) {
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
                                            if (result.status == 0) {
                                                Swal.fire({
                                                    title: 'Oops!! Payment failed.. Try again!',
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
                                                //window.location.href = result.thank_you_url;
                                                actions.redirect(result.thank_you_url);
                                            }
                                        }
                                    },
                                    error: function (error) {

                                    }
                                });
                            }
                        });
                    },

                    onError: function (err) {
                        console.log(err);
                    }
                }).render('#paypal-button-container');
            }
            initPayPalButton();
        </script>
    </body>
</html>