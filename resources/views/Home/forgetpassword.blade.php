@extends('layouts.loginsignup')

@section('content')
	

	<section class="sign-up-area">
        
            <div class="row ml-0 mr-0">
                <div class="col-lg-7 pl-0">
                    <div class="sign-up-lt">
                        <a class="nav-link text-center" href="#">
                            <img src="{{asset('assets/img/stockx.png')}}" alt="" />
                        </a>
                        <div class="sign-up-tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab" href="{{ URL::to('/forgetpassword') }}">Forget Password</a>
                                </li>
                                
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    
                                    <form class="sign-up-form" id="forgetpass_form" method="POST" action="{{ URL::to('/changepassmailsend') }}">
                                        @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                        @endif
                                        <br>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="text-center mt-4 mb-4">
                                            <input type="submit" class="btn btn-dark" value="Send Mail">
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