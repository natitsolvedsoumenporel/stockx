@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        <?php
                        $url = 'admin/saveuseredit/'.base64_encode($user->id); ?>
                        {{ Form::model($user, array('url' => $url,'enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <?php //print_r($user); ?>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">User edit</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('first_name', 'First Name')}}
                                {{ Form::text('first_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('last_name', 'Last Name')}}
                                {{ Form::text('last_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('name', 'User Name')}}
                                {{ Form::text('name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                {{Form::label('email', 'User Email')}}
                                {{ Form::email('email', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" type="password">
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                {{Form::label('user_type', 'User Type')}}
                                {{Form::select('user_type', array('1'=>'Seller','2'=>'Buyer'),null,array('class' => 'form-control' ))}}

                                <br>
                                {{Form::label('phone', 'Phone Number')}}
                                {{ Form::text('phone', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                @if(!empty($user->image))
                                <img height="150px" width="150px" src="{{URL::to('/').'/'.$user->image}}" alt="" ><br>
                                @endif
                                <br>
                                {{Form::label('image', 'User Image')}}
                                {{ Form::file('image', array('class' => 'form-control')) }}
                                <input type="hidden" name="hideimg" value="{{ $user->image }}">
                                <br>
                                
                                <label for="is_active">Status</label>
                                <input class="" name="is_active" <?php if($user->is_active == 1){ ?>checked<?php }?>  id="is_active" type="checkbox">
                                
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

