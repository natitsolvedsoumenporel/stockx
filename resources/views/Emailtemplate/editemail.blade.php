@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        <?php 
                        $url = 'admin/editemailsave/'.base64_encode($emailTemplate->id);
                        ?>
                        {{ Form::model($emailTemplate, array('url' => $url,'enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Email Template add</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('subject', 'Subject')}}
                                {{ Form::text('subject', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('content', 'Content')}}
                                {{ Form::textarea('content', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                
                                
                                <label for="is_active">Status</label>
                                <input class="" name="activated" <?php if($emailTemplate->activated == 1){ ?>checked<?php }?> id="is_active" type="checkbox">
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

