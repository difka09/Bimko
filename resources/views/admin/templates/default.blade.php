<!DOCTYPE html>
<html>
    @include('admin.templates.partials._head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.templates.partials._header')

    @include('admin.templates.partials._sidebar')

  <div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>
  </div>

    @include('admin.templates.partials._footer')


<div class="control-sidebar-bg">
  @include('admin.templates.partials._control-sidebar')
</div>

</div>

    @include('admin.templates.partials._scripts')
</body>
</html>
