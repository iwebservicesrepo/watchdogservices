<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
@extends('web.master')
@section('title', 'Thank You')
@section('content')
<!-- Start Breadcrumb Area -->
<section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breacrumb-content pt-100 pb-100 text-center">
                    <h2>Thank You</h2>
                    <ul>
                        <li><a href="<?php echo $base_url ?>index.html">Home</a></li>
                        <li>Thank You</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->
<section class="pricing-area pt-100 pb-70 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <h3>Thank You</h3>
                        <p class="my-3"><i class="fa fa-check fa-3x text-success"></i></p>
                        <p>Your transaction has been successful with the transaction ID <strong class="text-success">#{{$txn_id}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@stop