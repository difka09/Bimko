<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    body{
        background-color: #868F9B;
    }
    h1,h2,img,p{
        text-align: center;
        display: block;
        color:white;
        margin-left: auto;
        margin-right: auto;
    }
    h1{
        margin-top:30px;
        display:block;
    }
    a{
        color:#ffffff;
        weight:bold;
    }
    </style>
    <style>
    .overlay {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0, 0.9);
      overflow-x: hidden;
      transition: 0.5s;
    }
    
    .overlay-content {
      position: relative;
      top: 25%;
      width: 100%;
      text-align: center;
      margin-top: 30px;
    }
    
    .overlay a {
      padding: 8px;
      text-decoration: none;
      font-size: 36px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }
    
    .overlay a:hover, .overlay a:focus {
      color: #f1f1f1;
    }
    
    .overlay .closebtn {
      position: absolute;
      top: 20px;
      right: 45px;
      font-size: 60px;
    }
    
    @media screen and (max-height: 450px) {
      .overlay a {font-size: 20px}
      .overlay .closebtn {
      font-size: 40px;
      top: 15px;
      right: 35px;
      }
    }
    </style>
    
    <title>Bimko | Menuju ke halaman landing..</title>
  </head>
  <body>
      <!-- The overlay -->
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <div id="myNav" class="overlay" style="width:100%">
    <!-- Button to close the overlay navigation -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <h1>Aplikasi Penelitian Tugas Akhir Universitas Diponegoro Fakultas Teknik Komputer</h1>
        <h2>Pembuatan Sistem Informasi Bimbingan dan Konseling SMK di Kabupaten Blora Menggunakan Kerangka Kerja <em>Laravel</em></h2>
        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/2/2d/Undip.png/220px-Undip.png" alt="UNDIP">
        <p>Difka Satria Akbar | 21120115120019</p>
        <br>
        <!--<p>akan menuju ke halaman <a href="/">landing</a> dalam <span id="counter">15</span> detik</p>-->
    </div>
    <span onclick="openNav()">open</span>

    </div>
    <!--<script type="text/javascript">-->
    <!--    function countdown() {-->
    <!--        var x = 1;-->
    <!--        var i = document.getElementById('counter');-->
    <!--        if (parseInt(i.innerHTML) === x) {-->
    <!--            location.href = '/';-->
    <!--        }-->
    <!--        i.innerHTML = parseInt(i.innerHTML)-1;-->
    <!--    }-->
    <!--    setInterval(function(){ countdown(); },1000);-->
    <!--</script>-->
    <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }
    
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>