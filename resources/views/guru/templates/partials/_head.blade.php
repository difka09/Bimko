<head>
        {{-- <h6> {{ request()->is('tes/123') ? 'Beranda' : '' }} </h6>

        <title>{{ request()->is('tes/123') ? 'Beranda' : '' }}</title>
        <title>{{ request()->is('tes/123/a/files') ? 'Data File' : '' }}</title>
        <title>{{ request()->is('tes/123/a/agenda') ? 'agenda' : '' }}</title>
        <title>{{ request()->is('tes/123/profil/*') ? 'profil' : '' }}</title>
        <title>{{ request()->is('tes/123/edit/profil') ? 'edit profil' : '' }}</title> --}}
        <title>@yield('pageTitle')</title>

        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('select2css')
        @stack('customizecss')

        <!-- Main Font -->
        <script src="{{asset('guru/js/webfontloader.min.js')}}"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Roboto:300,400,500,700:latin']
                }
            });
        </script>
        <script>
            window.Laravel = @json(['csrfToken' => csrf_token()]);
        </script>

        @if (!auth()->guest())
        <script>
            window.Laravel.userId = {{ auth()->user()->id }}
        </script>
        @endif

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-reboot.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/Bootstrap/dist/css/bootstrap-grid.css')}}">
        {{-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> --}}

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

    .home-title span:hover, .home-title span:active {
        color: orangered;
    }

}
</style>
        <!-- Main Styles CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/main.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('guru/css/fonts.min.css')}}">
        @stack('customecss')
        @stack('uploadicon')

</head>
