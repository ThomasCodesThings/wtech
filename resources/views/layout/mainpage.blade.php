<!doctype html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.page.header')
    @include('layout.partials.page.banner')
  
    <main role="main">
        @yield('content')
    </main>
    @include('layout.partials.page.footer')
    @include('layout.partials.foot')
</body>
</html> 