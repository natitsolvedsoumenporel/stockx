@extends('layouts.search')

@section('content')
<?php //print_r($product_details); exit; ?>
<div class="container mb-5" style="margin-top: 120px;">
        
        <div class="row bid">

            <div class="col-lg-7 col-12 text-center mt-sm-0 mt-lg-4">
                <!-- <h2 class="mt-lg-4">Adidas NMD Hu<br> 
                    Pharrell x Billionaire Boys Club Multi-Color</h2> -->
                    <h2 class="mt-lg-4">{{$product_details['brandname']['brand_name']}}<br> 
                    {{$product_details['p_name']}}</h2>
                <h4 class="mt-3">Highest Bid: ${{$product_details['highestbid']}} | Lowest Ask: ${{$product_details['lowestask']}}</h4>
                @if(!empty($pValue['imagepath']))
                <img class="mt-5 img-fluid" src="{{URL::to('/').'/'.$product_details['imagepath'][0]['originalpath']}}" alt="">                           
                @else
                <img class="mt-5 img-fluid" src="{{asset('assets/frontend/images/featured-d.png')}}" alt="">                           
                @endif
            </div>
            <div class="col-lg-5 col-12 text-center">
                <div class="border p-4">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="U.S. Men's Size 4">
                        <i class="far fa-edit"></i>
                    </div>
                    <div class="tab mt-5">
                        <p>
                        <a class="btn btn-primary mr-5" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                      Place Bid
                        </a>
                        <button class="btn btn-primary tab" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      Buy Now
                        </button>
                        </p>
                        <div class="collapse show" id="collapseExample">
                            <div class="card card-body">
                                <div class="form-group d-flex align-items-center mb-1">
                                    <label class="mb-0 mr-4">$</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="300">
                                </div>
                                <p class="ml-4">You are about to sell at the highest Bid price</p>
                                <p>Or <b>Buy Now for As low as $17/month with Affirm </b></p>
                                    <p class="d-flex justify-content-between">Estimated Shipping<span class="float-right">$13.95</span></p>
                                    <p class="d-flex justify-content-between">Authentication Fee<span class="float-right">Free</span></p>
                                    <p class="d-flex justify-content-between top pt-3">Total<span class="float-right">$313.95</span></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 my-5 d-flex justify-content-end">
                <button class="size-bt active px-5 mr-2">BACK</button>
                <button class="size-bt px-5">NEXT</button>
            </div>

            
        </div>        
   
    </div>
@endsection

