<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    @include('front.layout.style')

    @stack('styles')
<body>
    <div id="wrapper">
    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')

    @include('front.layout.script')

    @stack('scripts')
    </div>
</body>
</html>
