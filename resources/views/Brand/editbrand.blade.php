@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        <?php 
                        $url = 'admin/editbrandsave/'.base64_encode($brand->id);
                        ?>
                        {{ Form::model($brand, array('url' => $url,'enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Brand Edit</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('brand_name', 'Brand Name')}}
                                {{ Form::text('brand_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                                              
                                
                                <label for="is_active">Status</label>
                                <input class="" name="is_active" <?php if($brand->is_active == 1){ ?>checked<?php }?> id="is_active" type="checkbox">
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

