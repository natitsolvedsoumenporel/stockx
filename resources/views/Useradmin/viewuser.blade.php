@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">User {{$user['first_name']}} {{$user['last_name']}}</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('first_name', 'First Name')}}: {{$user['first_name']}}
                               
                                <br>
                                {{Form::label('last_name', 'Last Name')}}: {{$user['last_name']}}
                               
                                <br>
                                {{Form::label('name', 'User Name')}}: {{$user['name']}}
                                
                                <br>
                                
                                {{Form::label('email', 'User Email')}}: {{$user['email']}}
                                
                                <br>
                                
                                {{Form::label('user_type', 'User Type')}}: @if($user['user_type'] == 1) Seller @else Buyer @endif
                                

                                <br>
                                {{Form::label('phone', 'Phone Number')}}: {{$user['phone']}}
                                
                                <br>
                                
                                @if(!empty($user['image']))
                                {{Form::label('image', 'User Image')}}
                                <img height="150px" width="150px" src="{{URL::to('/').'/'.$user['image']}}" alt="" ><br>
                                @endif
                                <br>
                                
                                
                                <label for="is_active">Status</label>: @if($user['is_active'] == 1) Active @else Inactive @endif
                                <br>
                                <label for="approve">Approve/Disapprove</label>: @if($user['approve'] == 1) Approved @else Disapproved @endif
                                
                                <br>
                                
                                
                            </div>
                            
                        </div>
                        
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>
@endsection

