<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
@extends('web.master')
@section('title', 'Subscription')
@section('content')
<!-- Start Breadcrumb Area -->
<section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breacrumb-content pt-100 pb-100 text-center">
                    <h2>Subscription</h2>
                    <ul>
                        <li><a href="<?php echo $base_url ?>index.html">Home</a></li>
                        <li>Subscription</li>
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
        <!-- Section Title -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="section-title mb-50">
                    <h2 class="text-center">Home Title Fraud Protection Pricing Plans</h2>
                    <div class="section-title-divider"></div>

                </div>
            </div>
        </div>
        <div class="row">
            <?php if (auth()->user()->is_plan_expired == 1 || auth()->user()->is_plan_expired == NULL) { ?>
                <!-- Single -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="pricing-single">
                        <h3>Standard</h3>
                        <h2><sup>$</sup>13 <span>/ month</span></h2>
                        <ul>
                            <li>Monthly Subscription</li>
                        </ul>
                        <div class="pricing-btn mt-20">
                            <a class="button-1 btn-bg-two" href="{{ URL('/user/checkout').'/'.base64_encode(env('PRICE_1')) }}">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="pricing-single">
                        <div class="popular">popular</div>
                        <h3>Per Year</h3>
                        <h2><sup>$</sup>143 <span>/ year</span></h2>
                        <ul>
                            <li>Annual Subscription</li>
                            <li><strong>FREE</strong> First Month</li>
                        </ul>
                        <div class="pricing-btn mt-20">
                            <a class="button-1 btn-bg-two" href="{{ URL('/user/checkout').'/'.base64_encode(env('PRICE_2')) }}">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="pricing-single">
                        <h3>Package</h3>
                        <h2><sup>$</sup>500 <span>/ 4 years</span></h2>
                        <ul>
                            <li>4 Year Subscription</li>
                        </ul>
                        <div class="pricing-btn mt-20">
                            <a class="button-1 btn-bg-two" href="{{ URL('/user/checkout').'/'.base64_encode(env('PRICE_3')) }}">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                $getPlanDetails = (new \App\Http\Helper\Web)->getPlanName(auth()->user()->price);
                ?>
                <div class="col-lg-4 col-md-6 mb-30">&nbsp;</div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="pricing-single">
                        <h2><span>Plan : 
                                <span class="badge bg-success text-light p-1">{{ $getPlanDetails['plan_name'] }}</span>
                                (${{ auth()->user()->price }}{{ $getPlanDetails['subscriptionType'] }})</span></h2>
                        <h2><span>Plan Expired On : {{ date('d F,Y',strtotime(auth()->user()->plan_end_date)) }}</span></h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">&nbsp;</div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Our Pricing Plan -->
@stop
@section('scripts')
<script type='text/javascript'>
    $(document).ready(function () {
    });
</script>
@stop