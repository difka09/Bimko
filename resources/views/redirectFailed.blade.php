<html>
    {{-- <head>
        <meta http-equiv="refresh" content="3;url=/feed" />
    </head> --}}
    <body>
        <p>Register gagal, periksa kolom yang diisi, akan redirek dalam <span id="counter">3</span> detik</p>
        <script type="text/javascript">
            function countdown() {
                var x = 1;
                var i = document.getElementById('counter');
                if (parseInt(i.innerHTML) === x) {
                    location.href = '/';
                }
                i.innerHTML = parseInt(i.innerHTML)-1;
            }
            setInterval(function(){ countdown(); },1000);
        </script>
    </body>
</html>
