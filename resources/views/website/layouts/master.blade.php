<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('website.layouts.head')
    @yield('style')
</head>
<body>
    @include('website.layouts.navbar')
    @include('website.layouts.whatsapp')
    @include('website.layouts.messanger')
    @yield('content')
    @include('website.layouts.footer')
    @include('website.layouts.up-btn')
    @include('website.layouts.footer-scripts')
    @stack('js')

</body>

</html>
