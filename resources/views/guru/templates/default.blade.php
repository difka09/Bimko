<!DOCTYPE html>
<html lang="en">
    @include('guru.templates.partials._head')
<body>
    @include('guru.templates.partials._header')
    <div class="header-spacer"></div>

        <div class="container">
            <div class="row">

                <!-- Main Content -->
                @yield('content')
                {{-- ('guru.templates.partials._content') --}}
                <!-- ... end Main Content -->

                <!-- Left Sidebar -->
                @include('guru.templates.partials._leftsidebar')
                <!-- ... end Left Sidebar -->

                <!-- Right Sidebar -->
                @include('guru.templates.partials._rightsidebar')
                <!-- ... end Right Sidebar -->

            </div>
        </div>
        @include('guru.templates.partials._scripts')
</body>
</html>

