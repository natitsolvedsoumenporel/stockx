@extends('layouts.frontend')

@section('content')
<section class="edit-pro-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mr-auto ml-auto">
                  
                    <form class="edit-pro-form" id="editprofile" method="POST" action="{{ URL::to('/savedetails') }}">
                        <h3 class="text-uppercase text-center mb-5">Edit Profile</h3>
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <br>
                        {{ csrf_field() }}
                                
                                <div class="mb-4">
                                    <h6>Name</h6>
                                    <div class="form-group">
                                        <input type="text" name="first_name" value="{{Auth::user()->first_name}}" class="form-control" placeholder="Ridima">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" name="last_name" value="{{Auth::user()->last_name}}" class="form-control" placeholder="Sen">
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <h6>User Info</h6>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" value="{{Auth::user()->shoesize}}" name="shoesize" >
                                            <option <?php if(Auth::user()->shoesize == 1){ ?>selected <?php } ?> value="1">1</option>
                                            <option <?php if(Auth::user()->shoesize == 2){ ?>selected <?php } ?> value="2">2</option>
                                            <option <?php if(Auth::user()->shoesize == 3){ ?>selected <?php } ?> value="3">3</option>
                                            <option <?php if(Auth::user()->shoesize == 4){ ?>selected <?php } ?> value="4">4</option>
                                            <option <?php if(Auth::user()->shoesize == 5){ ?>selected <?php } ?> value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h6>Selected Currency</h6>                                
                                    <div class="form-group">
                                        <select class="form-control" value="{{Auth::user()->currency}}" name="currency">
                                            <option <?php if(Auth::user()->currency == 'USD'){ ?>selected <?php } ?> value="USD">USD</option>
                                            <option <?php if(Auth::user()->currency == 'INR'){ ?>selected <?php } ?> value="INR">INR</option>
                                                                                    
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <h6>Contact Info</h6>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="email" value="{{Auth::user()->email}}" disabled="disabled" name="email" class="form-control" placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
            
                                <div class="text-center mt-4 mb-4">
                                    <a href="{{ URL::to('/profile') }}" type="button" class="btn btn-outline-dark">Cancel</a>
                                    <input type="submit" class="btn btn-dark" value="Save">
                                </div>            
                            </form>
            
                    
                </div>
            </div>
        </div>
            
       
        
    </section>
@endsection