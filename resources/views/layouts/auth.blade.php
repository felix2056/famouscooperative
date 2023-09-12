<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="If you are looking for a financial institution that is committed to helping you reach your financial goals, Famous Co-operative is the right choice for you. We invite you to join us today and start building a brighter financial future!">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Daniel Felix - CodeBreaker">
    <meta name="robots" content="noindex, nofollow">
    <title>Authentication - Famous Co-operative</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/famous-cooperative-website-favicon-black.png') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">

                    <div class="account-logo">
                        <a href="index.html"><img src="{{ asset('images/logo/famous-cooperative-high-resolution-logo-black-on-transparent-background.png') }}" alt="Famous Cooperative" style="width: 25%;"></a>
                    </div>

                    <div class="account-box">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/slimscroll.init.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/app.min.js') }}"></script>
</body>
</html>
