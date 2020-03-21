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
