<!doctype html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.page.header')

    <main role="main" class ="height">
        @yield('content')
    </main>

    @include('layout.partials.page.footer')
</body>
</html> 