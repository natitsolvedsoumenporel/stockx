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
                        <!-- <div class="panel-heading">
                            <div>
                                <form name="Searchuserfrm" class="form-inline" method="get" action="{{ url('admin/listseller') }}" id="Searchuserfrm">
                                <label for="sortBy">Sort By</label>
                                <select name="sort_by" id="sortBy" class="form-control">
                                    <option value="">Select Option</option>
                                    <option value="1">User</option>
                                    <option value="2">Product</option>
                                    <option value="3">Date</option>
                                </select>
                                <input class="btn text-center" type="submit" value="Search">
                            </form>
                            </div>
                            <div style="float:right">
                            </div>
                        </div> -->
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><a href="{{ url('admin/listseller/1') }}"> Seller Name</a></th>
                                        <th><a href="{{ url('admin/listseller/2') }}">Product Name</a></th>
                                        <th>Quantity</th>
                                        <th>Highest Bid</th>
                                        <th>Lowest Ask</th>
                                        <th>Ask Price</th>
                                        <th>Order Status</th>
                                        <th><a href="{{ url('admin/listseller/3') }}">Order Date</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($list_sellers as $lseller)
                                        <tr>
                                            <td>{{$lseller['order_id']}}</td>
                                            <td>{{$lseller['userdetails']['name']}}</td>
                                            <td>{{$lseller['productdetails']['p_name']}}</td>
                                            <td>{{$lseller['quantity']}}</td>
                                            <td>{{$lseller['productdetails']['highestbid']}}</td>
                                            <td>{{$lseller['productdetails']['lowestask']}}</td>
                                            <td>{{$lseller['lowestask']}}</td>
                                            <td>{{$lseller['order_status']}}</td>
                                            <td>{{$lseller['order_date']}}</td>
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