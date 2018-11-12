<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div id="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($user, array('url' => 'admin/profilesave','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inputs</h3>
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
                                {{Form::label('email', 'E-Mail Address')}}
                                {{ Form::text('email', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('phone', 'Phone No.')}}
                                {{ Form::text('phone', null, array('class' => 'form-control')) }}
                                <br>
                                @if(!empty($user->image))
                                <img height="150px" width="150px" src="{{URL::to('/').'/'.$user->image}}" alt="" ><br>
                                @endif
                                {{Form::label('image', 'Profile Image')}}
                                {{ Form::file('image', array('class' => 'form-control')) }}
                                <input type="hidden" name="hideimg" value="{{ $user->image }}">
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
		</div>    
        @include('includes.footer')
    </div> 
    @include('includes.footerscript')
</body>
</html>