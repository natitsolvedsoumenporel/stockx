@extends('layouts.loginsignup')

@section('content')
	

	<section class="sign-up-area">
        
            <div class="row ml-0 mr-0">
                <div class="col-lg-7 pl-0">
                    <div class="sign-up-lt">
                        <a class="nav-link text-center" href="{{ URL::to('/') }}">
                            <img src="{{asset('assets/img/stockx.png')}}" alt="" />
                        </a>
                        <div class="sign-up-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab" href="{{ URL::to('/login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sign-up-tab" href="{{ URL::to('/signup') }}">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    
                                    <form class="sign-up-form" id="login_form" method="POST" action="{{ URL::to('/afterloginfrontend') }}">
                                        @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                        @endif
                                        <br>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        </div>
                                        <p class="text-center"> <a href="{{ URL::to('/forgetpassword') }}">Forgot Password ?</a> </p>
                                        <div class="text-center mt-4 mb-4">
                                            <input type="submit" class="btn btn-dark" value="Login">
                                        </div>

                                        <p class="text-uppercase text-center"> <strong>Or</strong> </p>
                                        <div class="sign-up-social mt-4">
                                            <button type="button" class="btn btn-primary"> <i class="fab fa-facebook-f"></i> Connect with Facebook</button>
                                            <button type="button" class="btn btn-info"> <i class="fab fa-twitter"></i> Connect with Twitter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-5 pr-0">
                    <div class="sign-up-rt">
                        <img src="{{asset('assets/frontend/images/login-pic.png')}}" alt="" />
                    </div>
                </div>
            </div>
       
        
    </section>
@endsection