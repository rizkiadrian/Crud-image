<!doctype html>
<html>
<head>
    @include('include.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('include.header')
    </header>

    <div id="main" class="row">

            @yield('content')
           

    </div>
</div>
    <footer class="row">
       @include('include.js')
    </footer>


</body>
</html>
