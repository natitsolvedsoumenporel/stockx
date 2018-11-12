<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div id="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="main">
        @yield('content')
        </div>    
        @include('includes.footer')
    </div> 
    @include('includes.footerscript')
</body>
</html>