<!doctype html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.header')
    @include('layout.partials.banner')
  
    <main role="main">
        @yield('content')
    </main>
  
    @include('layout.partials.footer')
    @include('layout.partials.foot')
</body>
</html> 