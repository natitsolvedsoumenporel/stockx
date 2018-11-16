<nav class="navbar navbar-expand-lg navbar-toggleable-md fixed-top navbar-light">
		<div class="container">
			<!--<a class="navbar-brand" href="#"><img src="images/home-logo.png" alt="" /></a>-->
	     	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		       <ul class="navbar-nav">
					<li class="nav-item logo">
                                            <a class="nav-link" href="{{ URL::to('/') }}"><img src="{{asset('assets/img/stockx.png')}}" alt="" style="height:60px" /></a>
					</li> 
				</ul>
				

				<ul class="navbar-nav right-navbar ml-auto">
					<li class="nav-item  active">
						<a class="nav-link" href="#"> Browse </a>
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



