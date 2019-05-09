<head>
        <title>Newsfeed</title>

        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('select2css')

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

<style>
div.ex1 {
  pointer-events: none;
}

div.ex2 {
  pointer-events: auto;
}

#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}


</style>
<style>
        .custome-title a:link, .custome-title a:visited {
            color:green;
        }
        .custome-title a:hover, .custome-title a:active {
            text-decoration: underline;
        }
</style>
        <!-- Main Styles CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/main.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/fonts.min.css')}}">
        @stack('customecss')
        @stack('uploadicon')

</head>
