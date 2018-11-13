@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($user, array('url' => 'admin/savepayment','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment Setting</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('payment_id', 'Payment Id')}}
                                {{ Form::text('payment_id', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('payment_key', 'Payment Key')}}
                                {{ Form::text('payment_key', null, array('class' => 'form-control' )) }}
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

