@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($attribute,array('url' => 'admin/saveattribute','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attribute add</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('category_id', 'Category Name')}}
                                {{Form::select('category_id', $all_category,null,array('class' => 'form-control',"required"=>"required" ))}}

                                <br>
                                {{Form::label('attribute_name', 'Attribute Name')}}
                                {{ Form::text('attribute_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                
                                {{Form::label('description', 'Description')}}
                                {{ Form::textarea('description', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                {{Form::label('features', 'Features')}}
                                <?php //print_r($all_features); exit;?>
                                @foreach($all_features as $key => $feature)
                                <input class="" name="features[]" value='{{$key}}'  id="features" type="checkbox">{{$feature}}
                                @endforeach

                                <br>
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

