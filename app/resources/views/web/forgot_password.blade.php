<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
@extends('web.master')
@section('title', 'Forgot Password')
@section('content')
<!-- Start Breadcrumb Area -->
<section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breacrumb-content pt-100 pb-100 text-center">
                    <h2>Forgot Password</h2>
                    <ul>
                        <li><a href="<?php echo $base_url ?>home">Home</a></li>
                        <li>Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumb Area -->

<div class="signing-register-area pt-100 pb-100 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="signing-register-area-full">
                    <h2>Forgot Password?</h2>
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close w-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close w-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <input type="email" name="email" id="email" placeholder="Email" required="" value="{{ old('email') }}">
                        <button class="button-1" type="submit">Reset Password</button>
                    </form>
                    <p class="pt-10">Have an Account? Please
                        <a href="{{ URL('/login') }}"> Click Here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script type='text/javascript'>
    $(document).ready(function () {
    });
</script>
@stop
