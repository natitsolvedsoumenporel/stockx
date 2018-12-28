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
                                <h3 class="panel-title">Product List</h3>
                            </div>
                            <div style="float:right">
                                <a href="{{ URL::to('admin/addproduct') }}" class="btn btn-info">Add Product</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($all_product as $pcat)
                                        <tr>
                                            <td>{{$pcat['product_id']}}</td>
                                            @if(!empty($pcat['imagepath']))
                                                <td><img height="50px" width="50px" src="{{URL::to('/').'/'.$pcat['imagepath'][0]['originalpath']}}" alt="" ></td>
                                            @else
                                                <td>No image</td>
                                            @endif
                                            <td>{{$pcat['p_name']}}</td>
                                            <td>{{$pcat['p_description']}}</td>
                                            <td>{{$pcat['parentcategory']['category_name']}}</td>
                                            @if($pcat['is_active'])
                                                <td>activated</td>
                                            @else
                                                <td>inactivated</td>
                                            @endif
                                            
                                            <td>{{ date('M d, Y',strtotime($pcat['created_at'])) }}</td>
                                            <td>
                                                <a href="{{ url('admin/viewproduct') }}/<?php echo base64_encode($pcat['product_id']); ?>" class="btn btn-success"><i class="lnr lnr-eye"></i> <span>View</span></a>
                                                <a href="{{ url('admin/editproduct') }}/<?php echo base64_encode($pcat['product_id']); ?>" class="btn btn-success"><i class="lnr lnr-pencil"></i> <span>Edit</span></a>
                                                
                                                <a href="javascript:void(0);" onclick=" var result = confirm('Want to delete?'); if (result) { window.location.href = '{{ url('admin/deleteproduct') }}'+'/'+'<?php echo base64_encode($pcat['product_id']); ?>'; }" class="btn btn-danger"><i class="lnr lnr-cross"></i> <span>Delete</span></a>
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