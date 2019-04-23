<head>
        <title>Newsfeed</title>

        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Main Font -->
        <script src="{{asset('guru/js/webfontloader.min.js')}}"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Roboto:300,400,500,700:latin']
                }
            });
        </script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-reboot.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-grid.css')}}">


        <!-- Main Styles CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/main.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/fonts.min.css')}}">

        @stack('uploadicon')

</head>
