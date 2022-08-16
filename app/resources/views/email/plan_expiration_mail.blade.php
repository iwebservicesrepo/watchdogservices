<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
        <style type="text/css">
            .jumbotron{
                margin-bottom: 0px !important;
            }
            .btn-group-lg>.btn, .btn-lg {
                padding: .9rem 6rem;
                font-size: 1.25rem;
                line-height: 1.5;
                border-radius: .3rem;
            }
        </style>
    </head>
    <body style="background-color: #e9ecef !important;">
        <div class="jumbotron text-center" style="text-align:center;padding: 20px;">
            <img src="https://watchdogtitleservices.com/assets/img/logo-new%20(4).png" style="width: 20% !important;" class="logo mb-5" alt="WatchDog Title Service">
            <hr>
            <h4 style="text-align: left;">Hi {{ $name }},</h4>
            <p style="text-align: left;">
                In just 5 days, your plan will expire. This means no more access to <b>WatchDog Title Service</b>. We hope you’ve enjoyed benifits of subscription.
            </p>
            <p style="text-align: left;">
                <b>You don't have to miss out.</b>
            </p>
            <p style="text-align: left;">
                Renew Plan by clicking on <a href="{{ $login_url }}" class="btn btn-success">Login</a>
            </p>
            <p style="text-align: left;">Cheers,<br>
                <b>{{ env('MAIL_TEAM_REGARDS') }}</b>
            </p>
        </div>
    </body>
</html>