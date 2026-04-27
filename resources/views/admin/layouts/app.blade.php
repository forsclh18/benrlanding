<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
    @include('admin.layouts.head')
    <body>
        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('admin.layouts.script')

        @stack('scripts')
    </body>
</html>
