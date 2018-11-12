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
            <div class="main-content">
                <div class="container-fluid">
                    <h3 class="page-title">Profile</h3>
			<div class="row">
                            <div class="col-md-6">
                            <!-- RECENT PURCHASES -->
                                <div class="panel">
                                    <div class="panel-heading">
                                            <h3 class="panel-title">Inputs</h3>
                                    </div>
                                    <form class="form-auth-small" method="POST" action="{{ URL::to('/adminafterLogin') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="signin-email" class="control-label sr-only">Email</label>
                                            <input type="email" class="form-control" name="email" id="signin-email" value="" placeholder="Email">
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="signin-password" class="control-label sr-only">Password</label>
                                            <input type="password" class="form-control" name="password" id="signin-password" value="" placeholder="Password">
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <!--								<div class="form-group clearfix">
                                                                                                                <label class="fancy-checkbox element-left">
                                                                                                                        <input type="checkbox" name="">
                                                                                                                        <span>Remember me</span>
                                                                                                                </label>
                                                                                                        </div>-->
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                        <div class="bottom">
                                            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                        </div>
                                    </form>
                                    
                                    <div class="panel-body">
                                            <input type="text" class="form-control" placeholder="text field">
                                    </div>
                                </div>
                            </div>
                            <!-- END RECENT PURCHASES -->
                        </div>
                        <div class="col-md-6">
                            <!-- MULTI CHARTS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Projection vs. Realization</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="visits-trends-chart" class="ct-chart"></div>
                                </div>
                            </div>
                            <!-- END MULTI CHARTS -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <!-- TODO LIST -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">To-Do List</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled todo-list">
                                        <li>
                                            <label class="control-inline fancy-checkbox">
                                                <input type="checkbox"><span></span>
                                            </label>
                                            <p>
                                                <span class="title">Restart Server</span>
                                                <span class="short-description">Dynamically integrate client-centric technologies without cooperative resources.</span>
                                                <span class="date">Oct 9, 2016</span>
                                            </p>
                                            <div class="controls">
                                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="control-inline fancy-checkbox">
                                                <input type="checkbox"><span></span>
                                            </label>
                                            <p>
                                                <span class="title">Retest Upload Scenario</span>
                                                <span class="short-description">Compellingly implement clicks-and-mortar relationships without highly efficient metrics.</span>
                                                <span class="date">Oct 23, 2016</span>
                                            </p>
                                            <div class="controls">
                                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="control-inline fancy-checkbox">
                                                <input type="checkbox"><span></span>
                                            </label>
                                            <p>
                                                <strong>Functional Spec Meeting</strong>
                                                <span class="short-description">Monotonectally formulate client-focused core competencies after parallel web-readiness.</span>
                                                <span class="date">Oct 11, 2016</span>
                                            </p>
                                            <div class="controls">
                                                <a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END TODO LIST -->
                        </div>
                        <div class="col-md-5">
                            <!-- TIMELINE -->
                            <div class="panel panel-scrolling">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent User Activity</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled activity-list">
                                        <li>
                                            <img src="assets/img/user1.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Michael</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user2.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Daniel</a> has been added as a team member to project <a href="#">System Update</a> <span class="timestamp">Yesterday</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user3.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Martha</a> created a new heatmap view <a href="#">Landing Page</a> <span class="timestamp">2 days ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user4.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Jane</a> has completed all of the tasks <span class="timestamp">2 days ago</span></p>
                                        </li>
                                        <li>
                                            <img src="assets/img/user5.png" alt="Avatar" class="img-circle pull-left avatar">
                                            <p><a href="#">Jason</a> started a discussion about <a href="#">Weekly Meeting</a> <span class="timestamp">3 days ago</span></p>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-primary btn-bottom center-block">Load More</button>
                                </div>
                            </div>
                            <!-- END TIMELINE -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- TASKS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">My Tasks</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled task-list">
                                        <li>
                                            <p>Updating Users Settings <span class="label-percent">23%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width:23%">
                                                    <span class="sr-only">23% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Load &amp; Stress Test <span class="label-percent">80%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Data Duplication Check <span class="label-percent">100%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">Success</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Server Check <span class="label-percent">45%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                    <span class="sr-only">45% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Mobile App Development <span class="label-percent">10%</span></p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                                    <span class="sr-only">10% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END TASKS -->
                        </div>
                        <div class="col-md-4">
                            <!-- VISIT CHART -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Website Visits</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="visits-chart" class="ct-chart"></div>
                                </div>
                            </div>
                            <!-- END VISIT CHART -->
                        </div>
                        <div class="col-md-4">
                            <!-- REALTIME CHART -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">System Load</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="system-load" class="easy-pie-chart" data-percent="70">
                                        <span class="percent">70</span>
                                    </div>
                                    <h4>CPU Load</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>High: <span>95%</span></li>
                                        <li>Average: <span>87%</span></li>
                                        <li>Low: <span>20%</span></li>
                                        <li>Threads: <span>996</span></li>
                                        <li>Processes: <span>259</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- END REALTIME CHART -->
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        @include('includes.footer')
    </div> 
    @include('includes.footerscript')
</body>
</html>