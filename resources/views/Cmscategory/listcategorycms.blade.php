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
                                <h3 class="panel-title">Cms Category List</h3>
                            </div>
                            <div style="float:right">
                                <a href="{{ URL::to('admin/addcategorycms') }}" class="btn btn-info">Add Cms Category</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($all_cmscat as $cmscatlist)
                                        <tr>
                                            <td>{{$cmscatlist['id']}}</td>
                                            
                                            <td>{{$cmscatlist['name']}}</td>
                                            <td>{{$cmscatlist['created_at']}}</td>
                                            <td>
                                                <a href="{{ url('admin/editcategorycms') }}/<?php echo base64_encode($cmscatlist['id']); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>
                                                <a href="javascript:void(0);" onclick=" var result = confirm('Want to delete?'); if (result) { window.location.href = '{{ url('admin/deletecmscategory') }}'+'/'+'<?php echo base64_encode($cmscatlist['id']); ?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
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