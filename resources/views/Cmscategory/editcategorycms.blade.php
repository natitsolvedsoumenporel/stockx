@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        <?php 
                        $url = 'admin/savecmscatedit/'.base64_encode($cmscat->id);
                        ?>
                        {{ Form::model($cmscat, array('url' => $url,'enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Parent Category add</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('name', 'Name')}}
                                {{ Form::text('name', null, array('class' => 'form-control' )) }}
                                
                                <br>
                                <label for="status">Status</label>
                                <input class="" name="status" <?php if($cmscat->status == 1){ ?>checked<?php }?> id="status" type="checkbox">
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

