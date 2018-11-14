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
                                <h3 class="panel-title">Attribute LIst</h3>
                            </div>
<!--                            <div style="float:right">
                                <a href="{{ URL::to('admin/addparentcategory') }}" class="btn btn-info">Add Parent category</a>
                            </div>-->
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Attribute Details</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($all_attribute as $pcat)
                                        <tr>
                                            <td>{{$pcat['attribute_id']}}</td>
                                            <td>{{$pcat['category']['category_name']}}</td>
                                            <td>{{$pcat['description']}}</td>
                                            
                                            <td>{{$pcat['created_at']}}</td>
                                            <td>
                                                <a href="{{ url('admin/editattribute') }}/<?php echo base64_encode($pcat['attribute_id']); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>
                                                
                                                <a href="javascript:void(0);" onclick=" var result = confirm('Want to delete?'); if (result) { window.location.href = '{{ url('admin/deleteattribute') }}'+'/'+'<?php echo base64_encode($pcat['attribute_id']); ?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
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