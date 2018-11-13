@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                                            @include('includes.flash')
<!--                                            @if(Session::has('message'))
                                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                                            @endif-->
                        <!-- INPUTS -->
                        {{ Form::model($user, array('url' => 'admin/passwordsave','enctype'=> 'multipart/form-data', 'id'=>'change_passfrom')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Change Password</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('old_password', 'Old Password')}}
                                {{ Form::password('old_password', array('class' => 'form-control','id' => 'old_password','required'=>'required')) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('new_password', 'New Password')}}
                                {{ Form::password('new_password',array('class' => 'form-control','id' => 'new_password','required'=>'required' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('confirm_password', 'Confirm Password')}}
                                {{ Form::password('confirm_password',array('class' => 'form-control','id' => 'cnf_password','required'=>'required' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                {{Form::submit('Save',array('class'=>'btn text-center'))}}
                            </div>
                            
                        </div>
                        {{ Form::close() }}
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>
@endsection
			<!-- END MAIN CONTENT -->
