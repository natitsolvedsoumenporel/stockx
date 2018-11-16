<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
                            <a href="{{ URL::to('/admin/dashboard') }}"><img src="{{asset('assets/img/stockx.png')}}" alt="Stockx Logo" class="img-responsive logo" style="height: 25px;"></a>
			</div>
			<div class="container-fluid">

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
<!--						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>-->
						<li class="dropdown">
							@if(!empty($userImage))
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset($userImage)}}" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							@else
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							@endif
							<ul class="dropdown-menu">
								<li><a href="{{ URL::to('admin/profile') }}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="{{ URL::to('admin/changepassword') }}"><i class="lnr lnr-keyboard"></i> <span>Change Password</span></a></li>
								<li><a href="{{ URL::to('admin/editsite') }}"><i class="lnr lnr-lock"></i> <span>Logo</span></a></li>
								<li><a href="{{ URL::to('admin/paymentsetting') }}"><i class="lnr lnr-cog"></i> <span>Payment Settings</span></a></li>
								<li><a href="{{ URL::to('admin/logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->