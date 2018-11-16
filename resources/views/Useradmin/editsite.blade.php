@extends('layouts.app')
@section('content')
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($siteSetting, array('url' => 'admin/sitesave','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Site</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('sitename', 'Site Name')}}
                                {{ Form::text('sitename', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                {{Form::label('siteemail', 'Site E-Mail Address')}}
                                {{ Form::text('siteemail', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                @if(!empty($siteSetting->logo))
                                <img height="150px" width="150px" src="{{URL::to('/').'/'.$siteSetting->logo}}" alt="" ><br>
                                @endif
                                {{Form::label('logo', 'Site Logo')}}
                                {{ Form::file('logo', array('class' => 'form-control')) }}
                                <input type="hidden" name="hideimg" value="{{ $siteSetting->logo }}">
                                <br>
                                {{Form::submit('Save',array('class'=>'btn text-center'))}}
                            </div>
                            
                        </div>
                        {{ Form::close() }}
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		@endsection