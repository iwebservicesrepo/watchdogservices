<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
@extends('web.master')
@section('title', 'Sign Up')
@section('content')
<!-- Start Breadcrumb Area -->
<section class="breadcrumb-area" style="background-image:url('<?php echo $base_url ?>assets/img/breadcrumb.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breacrumb-content pt-100 pb-100 text-center">
                    <h2>Sign Up</h2>
                    <ul>
                        <li><a href="<?php echo $base_url ?>home">Home</a></li>
                        <li>Sign Up</li>
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
                    <form class="form" method="post" action="">
                        @csrf
                        <div class="row p-5 py-2">
                            <h6><i class="fa fa-user"></i> Your Contact Information</h6>
                        </div>
                        <div class="row p-5 py-2">
                            <div class="col">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}">
                            </div>
                            <div class="col">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname"  value="{{ old('lname') }}">
                            </div>
                        </div>
                        <div class="row p-5 py-2">
                            <div class="col">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="col">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-5 border-light">
                        <div class="row p-5 py-2">
                            <h6><i class="fa fa-map-marker"></i> Address to Monitor</h6>
                        </div>
                        <div class="row p-5 py-2">
                            <div class="col">
                                <label>Street Addess</label>
                                <input type="text" class="form-control" id="street_address" name="street_address" value="{{ old('street_address') }}">
                            </div>
                            <div class="col">
                                <label>Apt Or Unit #</label>
                                <input type="text" class="form-control" id="apt_unit" name="apt_unit" value="{{ old('apt_unit') }}">
                            </div>
                        </div>
                        <div class="row p-5 py-2">
                            <div class="col">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label>State</label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="" disabled="">Select State</option>
                                            <?php foreach ($getStates as $row) { ?>
                                                <option value="<?php echo $row->code ?>" <?php if ($row->code == 'UT') { ?> selected="" <?php } ?>><?php echo $row->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-5 py-2">
                            <div class="col text-end">
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
@stop
@section('scripts')
<script type='text/javascript'>
    $(document).ready(function () {
        jQuery.validator.addMethod("noSpace", function (value, element) {
            return value == '' || value.trim().length != 0;
        }, "No space please and don't leave it empty");

        $(".form").validate({
            rules: {
                fname: {
                    required: true,
                    noSpace: true
                }, lname: {
                    required: true,
                    noSpace: true
                }, email: {
                    required: true,
                    email: true,
                    noSpace: true
                }, password: {
                    required: true,
                    noSpace: true
                }, phone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 12,
                    noSpace: true
                }, street_address: {
                    required: true,
                    noSpace: true
                }, /*apt_unit: {
                 required: true
                 }, */city: {
                    required: true,
                    noSpace: true
                }, state: {
                    required: true,
                    noSpace: true
                }, zip: {
                    required: true,
                    noSpace: true
                }
            },
            messages: {
                fname: {
                    required: "Please enter first name",
                    noSpace: "Please enter valid first name"
                }, lname: {
                    required: "Please enter last name",
                    noSpace: "Please enter valid last name"
                }, email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                    noSpace: "Please enter valid email"
                }, phone: {
                    required: "Please enter phone",
                    number: "Please enter valid phone",
                    minlength: "Please enter valid phone",
                    maxlength: "Please enter valid phone",
                    noSpace: "Please enter valid phone"
                }, street_address: {
                    required: "Please enter street address",
                    noSpace: "Please enter valid street address"
                }, /* apt_unit: {
                 required: "Please enter apartment/unit"
                 },*/ city: {
                    required: "Please enter city",
                    noSpace: "Please enter valid city",
                }, state: {
                    required: "Please enter state",
                    noSpace: "Please enter valid state"
                }, zip: {
                    required: "Please enter zip",
                    noSpace: "Please enter valid zip"
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
                form.submit();
            }
        });

    });
</script>
@stop