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
                                    <a class="nav-link" id="login-tab" href="{{ URL::to('/login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="sign-up-tab" href="{{ URL::to('/signup') }}">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab">
                                    
                                    <form class="sign-up-form" id="signup_form" method="POST" action="{{ URL::to('/aftersignupfrontend') }}">
                                        @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                        @endif
                                        <br>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="first_name"  placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="last_name"  placeholder="Last Name">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <!-- <small>You must use 8 or more characters with a mix of letters, numbers & symbols.</small> -->
                                        <p >
                                            You must use 8 or more characters with a mix of letters, numbers & symbols.
                                        </p>

                                        <h6>Choose your vice(s):</h6>

                                        <div class="choose-vice">
                                            <button type="button" class="btn btn-outline-dark">Sneakers</button>
                                            <button type="button" class="btn btn-outline-dark">Streetwear</button>
                                            <button type="button" class="btn btn-outline-dark">Handbags</button>
                                            <button type="button" class="btn btn-outline-dark">Watches</button>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1" required="required">
                                            <label class="form-check-label" for="exampleCheck1">By signing up, you agree to the &nbsp;<a href="/terms"><strong>Terms of Service</strong></a> and &nbsp;<a href="/privacy"><strong>Privacy Policy</strong></a>.</label>
                                            <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                                        </div>

                                        <div class="text-center mt-4 mb-4">
                                            <input type="submit" class="btn btn-dark" value="Sign Up">
                                        </div>
                                    
                                        <p class="text-uppercase text-center">
                                            <strong>Or</strong>
                                        </p>
                                        <div class="sign-up-social mt-4">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fab fa-facebook-f"></i> Connect with Facebook</button>
                                            <button type="button" class="btn btn-info">
                                                <i class="fab fa-twitter"></i> Connect with Twitter</button>
                                        </div>
                                    
                                    
                                        
                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
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