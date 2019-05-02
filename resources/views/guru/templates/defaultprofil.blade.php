<!DOCTYPE html>
<html lang="en">
    @include('guru.templates.partials._head')
<body>
    @include('guru.templates.partials._header')
    <div class="header-spacer"></div>
                <!-- Main Content -->
                @yield('content')
                <!-- ... end Main Content -->

        @include('guru.templates.partials._scripts')
</body>
</html>

