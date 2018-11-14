<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>S Solid</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/frontend/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/css/jquery.bxslider.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">

              <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

              <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/formValidation.js')}}"></script>
</head>

<body>

        @yield('content')

        @include('includes.frontfooter')

    @include('includes.frontfooterscript')
</body>
</html>