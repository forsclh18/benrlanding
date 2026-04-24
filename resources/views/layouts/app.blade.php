<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
    @include('layouts.head')
    <body>
        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('layouts.footer')

        @stack('scripts')
    </body>
</html>
