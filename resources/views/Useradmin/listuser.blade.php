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
                                <h3 class="panel-title">User LIst</h3>
                            </div>
                            <div style="float:right">
                                <!--<a href="{{ URL::to('admin/adduser') }}" class="btn btn-info">Add User</a>-->
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Image</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($user_details as $uset)
                                        <tr>
                                            <td>{{$uset['id']}}</td>
                                            @if($uset['image'] != '')
                                                <td><img height="50px" width="50px" src="{{URL::to('/').'/'.$uset['image']}}" alt="" ></td>
                                            @else
                                                <td>No image</td>
                                            @endif
                                            <td>{{$uset['name']}}</td>
                                            <?php //print_r($pcat); ?>
                                            <td>{{$uset['email']}}</td>
                                            @if($uset['user_type'] == 1)
                                                <td>Seller</td>
                                            @else
                                                <td>Buyer</td>
                                            @endif
                                            @if($uset['is_active'] == 1)
                                                <td>active</td>
                                            @else
                                                <td>inactive</td>
                                            @endif
                                            <td>{{$uset['created_at']}}</td>
                                            <td>
                                                <!--<a href="{{ url('admin/edituser') }}/<?php echo base64_encode($uset['id']); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>-->
                                                <a href="{{ url('admin/viewuser') }}/<?php echo base64_encode($uset['id']); ?>" class="btn btn-success"><i class="lnr lnr-eye"></i> <span>View</span></a>
                                                <a href="{{ url('admin/statususer') }}/<?php echo base64_encode($uset['id']); ?>" class="btn btn-info"><i class="lnr lnr-pencil"></i> <span>@if($uset['approve']==1)Disapprove @else Approve @endif </span></a>
                                                
                                                <a onclick="var result = confirm('Want to delete?'); if (result) { window.location.href = '{{ url('admin/deleteuser') }}'+'/'+'<?php echo base64_encode($uset['id']);?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
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