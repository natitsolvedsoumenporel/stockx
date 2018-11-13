@extends('layouts.app')
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-profile">
            <div class="row">
                <div class="col-md-12">
                    <!-- BORDERED TABLE -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div>
                                <h3 class="panel-title">Parent Category LIst</h3>
                            </div>
                            <div style="float:right">
                                <a href="{{ URL::to('admin/addparentcategory') }}" class="btn btn-info">Add Parent category</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Image</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($parent_category as $pcat)
                                        <tr>
                                            <td>{{$pcat->cat_id}}</td>
                                            @if($pcat->image != '')
                                                <td><img height="50px" width="50px" src="{{URL::to('/').'/'.$pcat->image}}" alt="" ></td>
                                            @else
                                                <td>No image</td>
                                            @endif
                                            <td>{{$pcat->category_name}}</td>
                                            @if($pcat->is_active == 1)
                                                <td>active</td>
                                            @else
                                                <td>inactive</td>
                                            @endif
                                            <td>{{$pcat->created_at}}</td>
                                            <td>
                                                <a href="{{ url('admin/editcategory') }}/<?php echo base64_encode($pcat->cat_id); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>
                                                
                                                <a href="javascript:void(0);" onclick="var result = confirm('Want to delete?'); if (result) { window.location.href = '{{ url('admin/deletecategory') }}'+'/'+'<?php echo base64_encode($pcat->cat_id); ?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
<!--                                    <tr>
                                        <td>2</td>
                                        <td>Simon</td>
                                        <td>Philips</td>
                                        <td>@simon</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Jane</td>
                                        <td>Doe</td>
                                        <td>@jane</td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection