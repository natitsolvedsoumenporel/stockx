<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ URL::to('admin/dashboard') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ URL::to('admin/listusers') }}" class="active"><i class="lnr lnr-users"></i> <span>Manage Users</span></a></li>
						<li><a href="{{ URL::to('admin/listemail') }}" class="active"><i class="lnr lnr-envelope"></i> <span>Manage Email Templates</span></a></li>
						<!--<li><a href="{{ URL::to('admin/listsubcategory') }}" class="active"><i class="lnr lnr-code"></i> <span>Manage Sub Category</span></a></li>-->
<!--						<li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
						<li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>-->
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-code"></i> <span>Manage Category</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('admin/listcategory') }}" class="">Manage Category</a></li>
									<li><a href="{{ URL::to('admin/listsubcategory') }}" class="">Manage Subcategory</a></li>
<!--									<li><a href="{{ URL::to('admin/password') }}" class="">Change Password</a></li>-->
								</ul>
							</div>
						</li>
                                                <li>
							<a href="#subUser" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>Manage Attribute</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="subUser" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('admin/listattribute') }}" class="">Manage Attribute</a></li>
									<li><a href="{{ URL::to('admin/addattribute') }}" class="">Add Attribute</a></li>
									<!--<li><a href="{{ URL::to('admin/password') }}" class="">Change Password</a></li>-->
								</ul>
							</div>
						</li>
                                                <li>
							<a href="#Color" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>Manage Color</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="Color" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('admin/listcolor') }}" class="">Color List</a></li>
									<li><a href="{{ URL::to('admin/addcolor') }}" class="">Add Color</a></li>
									<!--<li><a href="{{ URL::to('admin/password') }}" class="">Change Password</a></li>-->
								</ul>
							</div>
						</li>
                                                <li>
							<a href="#brand" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>Manage Brands</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="brand" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('admin/listbrand') }}" class="">Brand List</a></li>
									<li><a href="{{ URL::to('admin/addbrand') }}" class="">Add Brand</a></li>
									<!--<li><a href="{{ URL::to('admin/password') }}" class="">Change Password</a></li>-->
								</ul>
							</div>
						</li>
<!--                                                <li>
							<a href="#subSize" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>Manage Size</span> <i class="icon-submenu lnr lnr-chevron-right"></i></a>
							<div id="subSize" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('admin/listsize') }}" class="">Manage Size</a></li>
									<li><a href="{{ URL::to('admin/addsize') }}" class="">Add Size</a></li>
									<li><a href="{{ URL::to('admin/password') }}" class="">Change Password</a></li>
								</ul>
							</div>
						</li>-->
<!--						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>-->
					</ul>
				</nav>
			</div>
		</div>
    <!-- END LEFT SIDEBAR -->