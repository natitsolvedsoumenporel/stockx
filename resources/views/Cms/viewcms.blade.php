@extends('layouts.app')
@section('content')
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-profile">
                        <!-- INPUTS -->
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Product Details</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('page_title', 'Page Title')}}: {{$cmspage['page_title']}}
                               
                                <br>
                                {{Form::label('page_heading', 'Page Title')}}: {{$cmspage['page_heading']}}
                               
                                <br>
                                {{Form::label('name', 'Cms Category Name')}}: {{$cmspage['cmscategory']['name']}}
                                
                                <br>
                                {{Form::label('page_description', 'Page Description')}}: {{strip_tags($cmspage['page_description'])}}
                               
                                <br>
                                
                                
                                <label for="status">Status</label>: @if($cmspage['status'] == 1) Active @else Inactive @endif
                                <br>
                                
                                
                            </div>
                            
                        </div>
                        
                        <!-- END INPUTS -->
                    </div>
                </div>
            </div>
@endsection

