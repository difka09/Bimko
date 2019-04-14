<html>
    {{-- <head>
        <meta http-equiv="refresh" content="3;url=/feed" />
    </head> --}}
    <body>
        <p>Register berhasil, akan menuju ke portal web dalam <span id="counter">3</span> detik</p>
        <script type="text/javascript">
            function countdown() {
                var x = 1;
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML) === x) {
                    location.href = '/feed';
                }
                i.innerHTML = parseInt(i.innerHTML)-1;
            }
            setInterval(function(){ countdown(); },1000);
        </script>

    </body>
</html>
