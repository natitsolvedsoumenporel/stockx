@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($category, array('url' => 'admin/saveparentcat','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Parent Category add</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('category_name', 'Category Name')}}
                                {{ Form::text('category_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('description', 'Description')}}
                                {{ Form::textarea('description', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('image', 'Category Image')}}
                                {{ Form::file('image', array('class' => 'form-control')) }}
                                
                                <br>
                                
                                <label for="is_active">Status</label>
                                <input class="" name="is_active"  id="is_active" type="checkbox">
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

