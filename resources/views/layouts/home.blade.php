<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.fronthead')
</head>
<body>
<!--    <div id="wrapper">-->
        @include('includes.homeheader')
        
<!--        <div class="main">-->
        @yield('content')
<!--        </div>    -->
        @include('includes.frontfooter')
<!--    </div> -->
    @include('includes.frontfooterscript')
</body>
</html>