<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel="icon" href="../../favicon.ico">

  <title>S Solid</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
    
    <link href="{{ asset('assets/frontend/css/asRange.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery-asRange.js')}}"></script>
    
    <script type="text/javascript">
        var base_url = "{!! URL::to('/')!!}";
        //alert(base_url);
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-toggleable-md fixed-top navbar-light">
		<div class="container">
			<!--<a class="navbar-brand" href="#"><img src="images/home-logo.png" alt="" /></a>-->
	     	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		       <ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{ URL::to('/') }}"><img src="{{asset('assets/img/stockx.png')}}" alt=""  style="height:60px"/></a>
					</li> 
				</ul>
				

				<ul class="navbar-nav right-navbar ml-auto">
					<li class="nav-item  active">
						<a class="nav-link" href="#"> Browse </a>
						<!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div> -->
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" > News </a>						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Apps </a>						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> About	</a>						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Portfolio	</a>						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Sell </a>						
					</li>
					 @if(empty(Auth::user()->id))
					<li class="nav-item">
						<a class="nav-link" href="{{ URL::to('/login') }}"> Login </a>
					</li>
                                        @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ URL::to('/profile') }}">{{Auth::user()->first_name}} {{Auth::user()->last_name}} </a>
					</li>
                                        <li class="nav-item">
						<a class="nav-link" href="{{ URL::to('/logout') }}"> Sign Out </a>
					</li>
                                        @endif


				</ul>

				
			</div>
		</div>
	</nav>

        @yield('content')

        @include('includes.frontfooter')

    @include('includes.frontfooterscript')
</body>
</html>