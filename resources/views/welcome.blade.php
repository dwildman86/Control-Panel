<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                   Open Source Control Panel
                </div>
                <p>Currently under development an Open Source Control Panel that will help get you GDPR compliant.</p>
                <p>It will have the following features:</p>
                <p>Ability to setup hosting accounts via ServerPilot.io API</p>
                <p>Setup domains and domain records with Digital Ocean API</p>
                <p>Create email accounts via qboxmail.com API</p>
                <p>Services such as Website Hosting, Email Hosting &amp; DNS Hosting split up as oppose to one individual package.</p>
                <p>Automated subscription billing and invoicing using Stripe Checkout</p>
                <p>You can view the OpenSource code here on GitHub <a href="https://github.com/dwildman86/Control-Panel">Control Panel</a></p>
                <p>Lead Programmer - DevWildman - OpenSource License Apache-2.0</p>
            </div>
        </div>
    </body>
</html>
