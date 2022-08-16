<?php
$base_url = request()->getSchemeAndHttpHost() . '/';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }} | @yield('title')</title>
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="16x16">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="18x18">
        <link rel="icon" href="<?php echo $base_url ?>assets/img/icon.png" type="image/gif" sizes="20x20">
        @include('admin.includes.head')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('admin.includes.header')
            @include('admin.includes.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('admin.includes.footer')
            @yield('scripts')
        </div>
    </body>
</html>