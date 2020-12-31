<!doctype html>
<html lang="en">
@include('partials.head')
<body>
<div id="app">
    @include('partials.header')

    @yield('page')

    @include('partials.footer.footer')

</div>
</body>
</html>
