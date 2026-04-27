
<!DOCTYPE html>
<html lang="id">
    @include('user.layouts.head')
    <body>
        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('user.layouts.script')

        @stack('scripts')
    </body>
</html>
