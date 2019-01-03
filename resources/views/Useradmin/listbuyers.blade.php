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
                                        <th><a href="{{ url('admin/listbuyer/1') }}">Buyer Name</a></th>
                                        <th><a href="{{ url('admin/listbuyer/2') }}">Product Name</a></th>
                                        <th>Quantity</th>
                                        <th>Highest Bid</th>
                                        <th>Lowest Ask</th>
                                        <th>Bid Price</th>
                                        <th>Order Status</th>
                                        <th><a href="{{ url('admin/listbuyer/3') }}">Order Date</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($list_buyers as $lbuyer)
                                        <tr>
                                            <td>{{$lbuyer['order_id']}}</td>
                                            <td>{{$lbuyer['userdetails']['name']}}</td>
                                            <td>{{$lbuyer['productdetails']['p_name']}}</td>
                                            <td>{{$lbuyer['quantity']}}</td>
                                            <td>{{$lbuyer['productdetails']['highestbid']}}</td>
                                            <td>{{$lbuyer['productdetails']['lowestask']}}</td>
                                            <td>{{$lbuyer['highestbid']}}</td>
                                            <td>{{$lbuyer['order_status']}}</td>
                                            <td>{{$lbuyer['order_date']}}</td>
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