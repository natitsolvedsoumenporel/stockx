@extends('layouts.frontend')

@section('content')
<section class="edit-pro-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mr-auto ml-auto">
                  
                    <form class="edit-pro-form" id="editpass" method="POST" action="{{ URL::to('/savepass') }}">
                        <h3 class="text-uppercase text-center mb-5">Edit Password</h3>
                        @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <br>
                        {{ csrf_field() }}
                                
                                <div class="mb-4">
                                    <h6>Current Password</h6>
                                    <div class="form-group">
                                        <input type="password" name="currpassword" class="form-control" placeholder="Enter your current password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h6>New Password</h6> 
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h6>Confirm Password</h6>
                                    <div class="form-group">
                                        <input type="password" name="confpassword" class="form-control" placeholder="Enter new confirmed password">
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