<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._header')
</head>

<body>

@include('partials._navbar')

<div class="container theme-showcase" role="main">

    @yield('content')

</div>
<!-- /container -->

@include('partials._scripts')

</body>
</html>
