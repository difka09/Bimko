<!DOCTYPE html>
<html>
    @include('user.templates.panel._head')
<body>
    @include('user.templates.panel._header')

    <main class="row admin">
        <div class="col-12">
           @include('user.templates.panel._sidebar')

            @yield('content')
        </div>
    </main>

    @include('user.templates.panel._footer')
</body>
    @include('user.templates.panel._scripts')
</html>
