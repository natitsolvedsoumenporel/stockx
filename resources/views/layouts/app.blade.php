<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <script type="text/javascript">
    var base_url = "{!! URL::to('/')!!}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    </script>
</head>
<body>
    <div id="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="main">
            @yield('content')
        </div>
<!--        <main class="py-4">-->
            
<!--        </main>-->
    </div>
    @include('includes.footer')
    @include('includes.footerscript')
</body>
</html>
