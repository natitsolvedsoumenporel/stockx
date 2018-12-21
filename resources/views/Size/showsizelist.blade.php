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
                                <h3 class="panel-title">Size Number</h3>
                            </div>
                            <div style="float:right">
                                <a href="{{ URL::to('admin/addsizenumber') }}" class="btn btn-info">Add Size</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Shoe Number</th>
                                        <th>Size Type</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php //print_r($size_list_number);  exit; ?>
                                    @foreach($size_list_number as $key => $sizelistnum)
                                        <tr>
                                            <?php //print_r($sizelistnum); ?> 
                                            <td>{{$sizelistnum->id}}</td>
                                            
                                            <td>{{$sizelistnum->size_number}}</td>
                                            <td>{{$sizelistnum->size_name}}</td>
                                            <td>{{$sizelistnum->created_at}}</td>
                                            <td>
                                                <a href="{{ url('admin/editsizenumber') }}/<?php echo base64_encode($sizelistnum->id); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>
                                                
                                                <a href="javascript:void(0);" onclick=" var result = confirm('Want to delete?'); if (result) {  window.location.href = '{{ url('admin/deletesizenumber') }}'+'/'+'<?php echo base64_encode($sizelistnum->id); ?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
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