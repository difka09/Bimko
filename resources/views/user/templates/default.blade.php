<!DOCTYPE html>
<html lang="en">
    @include('user.templates.partials._head')
<body class="bg-light">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <main class="main oh" id="main">

    @include('user.templates.partials._header')



    <!-- Trending Now -->
    {{-- <div class="trending-now">
      <div class="container relative">
        <span class="trending-now__label">Trending</span>
        <ul class="newsticker">
          <li class="newsticker__item"><a href="single-post.html" class="newsticker__item-url">A-HA theme is multi-purpose solution for any kind of business</a></li>
          <li class="newsticker__item"><a href="single-post-1.html" class="newsticker__item-url">Satelite cost tens of millions or even hundreds of millions of dollars to build</a></li>
          <li class="newsticker__item"><a href="single-post-3.html" class="newsticker__item-url">8 Hidden Costs of Starting and Running a Business</a></li>
        </ul>
        <div class="newsticker-buttons">
          <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-left"></i></button>
          <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-right"></i></button>
        </div>
      </div>
    </div> --}}

    <div class="main-container container mt-40" id="main-container">

      <!-- Content -->
      <div class="row">

        @yield('content')


        @include('user.templates.partials._sidebar')


      </div> <!-- end content -->
    </div> <!-- end main container -->
    @include('user.templates.partials._footer')



  </main> <!-- end main-wrapper -->

  @include('user.templates.partials._scripts')

</body>
</html>
