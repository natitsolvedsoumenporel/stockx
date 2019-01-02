@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($cms, array('url' => 'admin/savecms','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Content</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('cms_cat_id', 'Cms Category')}}
                                {{ Form::select('cms_cat_id',  $cmscatlists, null, ['class' => 'form-control']) }}
                                
                                <br>
                                {{Form::label('page_title', 'Page Title')}}
                                {{ Form::text('page_title', null, array('class' => 'form-control' )) }}
                                
                                <br/>
                                {{Form::label('page_heading', 'Page Heading')}}
                                {{ Form::text('page_heading', null, array('class' => 'form-control' )) }}
                                
                                <br/>
                                {{Form::label('page_description', 'Page Description')}}
                                {{ Form::textarea('page_description', null, array('class' => 'form-control', 'id' => 'description' )) }}

                                <br>
                                <label for="status">Status</label>
                                <input class="" name="status"  id="status" type="checkbox">

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

