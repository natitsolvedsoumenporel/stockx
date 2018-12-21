@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        {{ Form::model($size, array('url' => 'admin/savesizenumber','enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Size Number</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('size_number', 'Size Number')}}
                                {{ Form::text('size_number', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                               <label for="size_type_id">Size Type Name</label>
                                <select name="size_type_id" class="form-control">
                                    <option>Select</option>
                                    @foreach($fetch_size_type_list as $fetchlist)
                                    <?php //echo $fetch_size->size_type_id; ?>
                                <?php //echo $fetchlist->id; ?>
                                    <option value="{{ $fetchlist->id }}">{{ $fetchlist->size_name }}</option>
                                    @endforeach
                                </select> 
                               <br/>
                                
                                {{Form::submit('Save',array('class'=>'btn text-center'))}}
                            </div>
                            
                        </div>
                        {{ Form::close() }}
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>
@endsection

