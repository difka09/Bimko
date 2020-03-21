  @extends('user.templates.default')
  @section('pageTitle', 'Bimko | Tentang Kami')
  @section('content')
  <!-- Posts -->
    <div class="col-lg-8 blog__content mb-30">
        <!-- Latest News -->
        <section class="section">
          <div class="title-wrap">
            <h3 class="section-title">Tentang Kami</h3>
          </div>
          <article class="entry post-list">
            <img src="{{asset('landing/img/logo.png')}}" alt="" align="left">
            <p></p>
            <p align="justify">Bimko merupakan suatu aplikasi web yang bergerak di bidang pendidikan dan dikelola oleh paguyuban guru bimbingan konseling SMK se-Kabupaten Blora. Aplikasi web ini dibangun tahun 2019 yang didirikan oleh mahasiswa berasal dari blora untuk meningkatkan mutu pendidikan siswa di kabupaten blora. Anggota dari aplikasi web ini merupakan kumpulan guru Bimbingan Konseling SMK di Kabupaten Blora, siswa SMK di Kabupaten Blora, dan mahasiswa yang berasal dari Kabupaten Blora.</p>
                <p>Untuk panduan atau pengoperasian aplikasi BIMKO dapat dilihat di <a href="https://www.youtube.com/playlist?list=PLv0iCwqUlobt_MttaPetDX3revrjeHZwX" target="_blank" style="color:blue"><u><b>video panduan bimko</b></u></a></p>
                <p>Untuk bertanya informasi mengenai sistem ini baik lapor user, menanyakan fitur, atau lainnya silahkan email admin di <b<b<p><b>admin@bimko.id</b></p>
          </article>
        </section> <!-- end latest news -->
    </div> <!-- end posts -->
      @endsection
