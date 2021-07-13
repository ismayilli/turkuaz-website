<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('layout.metadata.meta')
    @yield('metadata')
</head>

<body>

@include('layout.header')

@yield('content')

@include('layout.footer')

@include('layout.metadata.script')

</body>

</html>