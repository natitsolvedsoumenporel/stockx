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
                                    <a class="nav-link active" id="login-tab" href="javascript:void(0)">Set New Password</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                    
                                    <form class="sign-up-form" id="resetpassword" method="POST" action="{{ URL::to('/resetpassword') }}">
                                    @if(Session::has('message'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                    @endif
                                    <br>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="email" placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confpassword" class="form-control" id="password" placeholder="Confirm Password">
                                        </div>
                                        <input type="hidden" name="user" class="form-control" value="{{$id}}">
                                        <div class="text-center mt-4 mb-4">
                                            <input type="submit" class="btn btn-dark" value="Save">
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