<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.layout.header')
    @yield('styles')
</head>

<body>


<div id="app">
    @include('admin.layout.topnav')
<div class="wrapper">
    @yield('content')
</div>
<!-- end wrapper -->
</div>

@include('admin.layout.footer')

<script>
    window.AuthUser = '{!! auth()->user() !!}';

    window.__auth = function () {
        try {
            return JSON.parse(AuthUser)
        } catch (error) {
            return null
        }
    }
</script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>