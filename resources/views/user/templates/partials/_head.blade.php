<head>
    <title>Aha Magazine | Home</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="">

    <!-- Google Fonts -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>
    <!-- Css -->

    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('user/css/font-icons.css') }}" />
    @stack('select2styles')
    @stack('stylecustome')
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/css/custome.css') }}" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('user/img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('user/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('user/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('user/img/apple-touch-icon-114x114.png') }}">
    <style>
    .act-btn{
        background-image: url(images/maps/tanya1.png);
        background-repeat: no-repeat;
        background-position: 50% 50%;
        display: block;
        width: 400px;
        height: 250px;
        text-align: center;
        color: white;
        font-size: 30px;
        font-weight: bold;
        border-radius: 50%;
        text-decoration: none;
        transition: ease all 0.3s;
        position:fixed;
        z-index: 100;
        right: 30px;
        bottom: 30px;
        border: none;
    }
    </style>

    <!-- Lazyload -->
    <script src="{{ asset('user/js/lazysizes.min.js') }}"></script>

  </head>
