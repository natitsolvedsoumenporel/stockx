@extends('layouts.frontend')

@section('content')
    <section class="edit-pro-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 pl-0">
                    <div class="pro-lt">
                        <h4>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                        @include('includes.frontendsidebar')
<!--                        <ul class="list-group">
                            <li class="list-group-item"> <a href="#"> <i class="fas fa-shopping-cart"></i> Buying</a> </li>
                            <li class="list-group-item"> <a href="#"> <i class="far fa-money-bill-alt"></i> Selling</a> </li>
                            <li class="list-group-item"> <a href="#"> <i class="far fa-user"></i> Profile</a> </li>
                            <li class="list-group-item"> <a href="#"> <i class="far fa-image"></i>Portfolio</a> </li>
                            <li class="list-group-item"> <a href="#"> <i class="far fa-address-card"></i> Following</a> </li>
                            <li class="list-group-item"> <a href="#"> <i class="fas fa-cog"></i> Settings</a> </li>
                        </ul>-->
                    </div>
                </div>
                <div class="col-lg-9">
                  <div class="edit-pro-form">
                      <h3 class="text-uppercase text-center mb-5 d-flex align-items-start">Profile <a href='{{ URL::to('/editprofile') }}'><span class="yelw-text">Edit</span></a> </h3>                                     
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="pro-rt-sec">
                            <h5>Name</h5>
                            <p>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pro-rt-sec">
                            <h5>Selected Currency</h5>
                            <p>{{Auth::user()->currency}}</p>
                        </div>
                        
                    </div>
                    <div class="col-lg-6 col-md-3">
                        <div class="pro-rt-sec">
                            <h5>Shoe Size</h5>
                            <p>{{Auth::user()->shoesize}}</p>
                        </div>
                        
                    </div>
                  </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="pro-rt-sec">
                            <h5>Email Address</h5>
                            <p>{{Auth::user()->email}}</p>
                        </div>
                
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="pro-rt-sec">
                            <h5>Username</h5>
                            <p>{{Auth::user()->name}}</p>
                        </div>
                
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="pro-rt-sec">
                            <h5>Reset Password</h5>
                            <p> <a href="{{ URL::to('/profilepass') }}"> Click Here to Reset Password</a></p>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="pro-rt-sec">
                            <h5 class="d-flex align-items-start" >Vacation Mode 
                                <a href="#" class="d-flex align-items-start" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                <i class="fas fa-question-circle"></i>
                                </a>   </h5>
                            <button type="button" class="btn btn-dark">Turn On</button>
                        </div>
                    </div>
                
                </div>
                  
                    </div>
            
                    
                </div>
            </div>
        </div>
            
       
        
    </section>

@endsection