@extends('layouts.search')

@section('content')
<div class="container mb-5" style="margin-top: 105px;">
        
        <div class="row works text-center">
            <div class="col-12 mt-3">
                <h2>How it works</h2>
                <h6>See more information in our Terms and Conditions</h6>
            </div>

            <div class="col-12 mt-5">
                <div class="card-group ">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('assets/frontend/images/sell-works-img1.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Place an Ask</h5>
                            <p>List a product for sale or sell immediately at the highest bid</p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{asset('assets/frontend/images/sell-works-img2.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Ship to Us</h5>
                            <p>Ship your items within 2 business days. We authenticate, then ship it to the buyer</p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="{{asset('assets/frontend/images/sell-works-img3.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Prosper</h5>
                            <p>We release funds to you, you sip a daiquiri, knowing you will never get a chargeback</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-11 m-auto py-4">
                <p>DON'T FLAKE! There's a 15% penalty if you don't ship within 2 business days, if the item isn't authentic, is used, or not in the proper condition. When a 'Bid' and 'Ask' match, the trade is confirmed and can no longer be canceled.</p>
            </div>

            <div class="col-12 my-5">
                <button class="size-bt active px-5 mr-4">CANCEL</button>
                <button class="size-bt px-5">I UNDERSTAND</button>
            </div>

        </div>

        
   
    </div>
@endsection