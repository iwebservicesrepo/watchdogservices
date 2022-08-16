<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
@extends('web.master')
@section('title', 'Checkout')
@section('content')
<!-- Start Breadcrumb Area -->
<section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breacrumb-content pt-100 pb-100 text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="<?php echo $base_url ?>index.html">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->
<!-- Start Our Pricing Plan -->
<section class="pricing-area pt-100 pb-70 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Pricing Plan -->
@stop
@section('scripts')
<!-- test details -->
<!--<script src="https://www.paypal.com/sdk/js?client-id=AduM3JCbaGxXBOM2ZOqei3pBM8lFIHnIVilMnjA790dNHNyE-9mA8O9JsFNFDLdocP5RhorPXQviA-1p&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>-->
<!-- live details -->
<script src="https://www.paypal.com/sdk/js?client-id=AQJOFV2wKzFJi1snAP_27KTsvpaqkDHod6LYudaM-iFTjmDOwAdKYimdU3i-fTL0gYK937Lo7I3AVZvc&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script type="text/javascript">
    $(document).ready(function () {
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
                            email_address: '<?php echo auth()->user()->email ?>',
                            phone: {
                                phone_number: {
                                    national_number: '<?php echo auth()->user()->phone ?>',
                                }
                            },
                            name: {
                                given_name: '<?php echo auth()->user()->first_name . " " . auth()->user()->last_name ?>',
                                surname: '<?php echo auth()->user()->last_name ?>',
                            },
                            address: {
                                address_line_1: '<?php echo auth()->user()->street_address ?>',
                                address_line_2: '<?php echo auth()->user()->apt_unit ?>',
                                admin_area_2: '<?php echo auth()->user()->city ?>',
                                admin_area_1: '<?php echo auth()->user()->state ?>',
                                postal_code: '<?php echo auth()->user()->zip ?>',
                                country_code: 'US',
                            },
                        },
                        purchase_units: [{"amount": {"currency_code": "USD", "value": '<?php echo $price ?>'}}]
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
                                url: "<?php echo URL('/') ?>" + "/user/paypal-payment",
                                dataType: "json",
                                data: {data: orderData, price:<?php echo $price ?>, 'user_id': "<?php echo auth()->user()->id ?>", "_token": "{{ csrf_token() }}"},
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
    });
</script>
@stop