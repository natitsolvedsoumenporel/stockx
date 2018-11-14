@extends('layouts.frontend')

@section('content')
<section class="home-banner">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 px-0 text-left">					
                <h1>Shoes Turn</h1>
                <h1 class="mt-0">It Down</h1>
                <h3>sneakers get loud</h3>
                <!-- <h6 class="text-uppercase mt-3 mb-4">Canada's leading property managment firm</h6> -->
                <div class="home-search">
                    <div class="input-group">
                        <input type="text" class="form-control venue-location" placeholder="Search for brand, color, etc.">
                            <!-- <input type="text" class="form-control venue-name" placeholder="Venue name..."> -->
                        <div class="input-group-prepend">
                                <button class="btn btn-dark" type="button"> Browse</button>
                        </div>						
                    </div>						
                </div>
            </div>
        </div>
    </div>
</section>
<section class="banner-btm">
    <div class="container">
        <div class="banner-btm-tabber">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="sneakers-tab" data-toggle="tab" href="#sneakers" role="tab" aria-controls="sneakers" aria-selected="true">SNEAKERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="streetwear-tab" data-toggle="tab" href="#streetwear" role="tab" aria-controls="streetwear" aria-selected="false">STREETWEAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="watches-tab" data-toggle="tab" href="#watches" role="tab" aria-controls="watches" aria-selected="false">WATCHES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="handbags-tab" data-toggle="tab" href="#handbags" role="tab" aria-controls="handbags" aria-selected="false">HANDBAGS</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="sneakers" role="tabpanel" aria-labelledby="sneakers-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-a.png')}}" alt="">
                                <div class="black-overlay justify-content-end">
                                    <h6>Top Trending</h6>
                                    <h3>Men's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>										
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-b.png')}}" alt="">
                                <div class="black-overlay justify-content-start">
                                    <h6>New Arrivals</h6>
                                    <h3>woMen's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>
                                    <!-- <button class="button button-dark">
                                                                                                    View Listing
                                                                                            </button> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-c.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Amazing</h3>
                                    <h3>Sport Sneakers</h3>
                                </div>
                            </div>
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-d.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Best Collection</h3>
                                    <h3>Of Sneakers</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="streetwear" role="tabpanel" aria-labelledby="streetwear-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-a.png')}}" alt="">
                                <div class="black-overlay justify-content-end">
                                    <h6>Top Trending</h6>
                                    <h3>Men's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-b.png')}}" alt="">
                                <div class="black-overlay justify-content-start">
                                    <h6>New Arrivals</h6>
                                    <h3>woMen's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-c.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Amazing</h3>
                                    <h3>Sport Sneakers</h3>
                                </div>
                            </div>
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-d.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Best Collection</h3>
                                    <h3>Of Sneakers</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="watches" role="tabpanel" aria-labelledby="watches-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-a.png')}}" alt="">
                                <div class="black-overlay justify-content-end">
                                    <h6>Top Trending</h6>
                                    <h3>Men's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-b.png')}}" alt="">
                                <div class="black-overlay justify-content-start">
                                    <h6>New Arrivals</h6>
                                    <h3>woMen's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-c.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Amazing</h3>
                                    <h3>Sport Sneakers</h3>
                                </div>
                            </div>
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="images/{{asset('assets/frontend/images/pic-d.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Best Collection</h3>
                                    <h3>Of Sneakers</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="handbags" role="tabpanel" aria-labelledby="handbags-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-a.png')}}" alt="">
                                <div class="black-overlay justify-content-end">
                                    <h6>Top Trending</h6>
                                    <h3>Men's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-b.png')}}" alt="">
                                <div class="black-overlay justify-content-start">
                                    <h6>New Arrivals</h6>
                                    <h3>woMen's</h3>
                                    <h3>Collection Sneaker</h3>
                                    <h1>2018</h1>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-3">
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-c.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Amazing</h3>
                                    <h3>Sport Sneakers</h3>
                                </div>
                            </div>
                            <div class="dress-collection-b">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/pic-a.png')}}" alt="">
                                <div class="black-overlay justify-content-center">
                                    <h3 class="yellow-text">Best Collection</h3>
                                    <h3>Of Sneakers</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>				
        </div>
    </div>
</section>
<section class="feature-list">
    <div class="row ml-0 mr-0">
        <div class="col-lg-4 col-md-4 pl-0">
            <div class="feature-caro-sec popu-brand">
                <h3>Popular Brand</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    text ever since the 1500s,</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="feature-caro-sec">
                <div class="user-image">
                    <img class="img-fluid" src="{{asset('assets/frontend/images/featured-b.png')}}" alt="">
                </div>
                <div class="feature-text-part">
                    <h4>Nike</h4>
                    <p class="courtesy-text">Starting from $175</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="feature-caro-sec">
                <div class="user-image">
                    <img class="img-fluid" src="{{asset('assets/frontend/images/featured-c.png')}}" alt="">
                </div>
                <div class="feature-text-part">
                    <h4>Nike</h4>
                    <p class="courtesy-text">Starting from $175</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="feature-caro-sec">
                <div class="user-image">
                    <img class="img-fluid" src="{{asset('assets/frontend/images/featured-d.png')}}" alt="">
                </div>
                <div class="feature-text-part">
                    <h4>Nike</h4>
                    <p class="courtesy-text">Starting from $175</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 pr-0">
            <div class="feature-caro-sec">
                <div class="user-image">
                    <img class="img-fluid" src="images/{{asset('assets/frontend/images/featured-e.png')}}" alt="">
                </div>
                <div class="feature-text-part">
                    <h4>Nike</h4>
                    <p class="courtesy-text">Starting from $175</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="most-popu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="d-flex allign-items-center justify-content-between top-brdr">
                    <h3 class=" text-uppercase">
                        <i class="fas fa-align-left"></i> Our Services</h3>
                    <h6>See All</h6>
                </div>					
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">						
                    <div class="most-popu-pic">
                        <div class="overlay-div">
                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/shop-cart.png')}}" alt="" >
                            </a>

                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/hammer.png')}}" alt="">									 
                            </a>
                        </div>
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-d.png')}}" alt="">														
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <div class="overlay-div">
                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/shop-cart.png')}}" alt="">
                            </a>

                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/hammer.png')}}" alt="">
                            </a>
                        </div>
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-e.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <div class="overlay-div">
                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/shop-cart.png')}}" alt="">
                            </a>

                            <a href="#" class="d-inline-block">
                                <img class="img-fluid" src="{{asset('assets/frontend/images/hammer.png')}}" alt="">
                            </a>
                        </div>
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-a.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="most-popu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="d-flex allign-items-center justify-content-between top-brdr">
                    <h3 class="text-uppercase">
                        <i class="fas fa-align-left"></i> new Lowest Ask</h3>
                    <h6>See All</h6>
                </div>					
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-b.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-c.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-f.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>LOWEST ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="most-popu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="d-flex allign-items-center justify-content-between top-brdr">
                    <h3 class="text-uppercase">
                        <i class="fas fa-align-left"></i> new HIGHEST bIDS</h3>
                    <h6>See All</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-g.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>Highest ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-h.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>Highest ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-i.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                <p>Highest ASK</p>
                                <h1>$127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <h6>$600 Sold</h6>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="most-popu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-center top-brdr">
                    <h3 class="text-uppercase"> Latest News </h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-j.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <small>Alina Wilson - October 17, 2018</small>
                        <h4 class="mt-1">Dont Go Barefoot: Skating the Top 10 Most Influential Non-Skate Skate Shoes</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-k.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <small>Alina Wilson - October 17, 2018</small>
                        <h4 class="mt-1">Dont Go Barefoot: Skating the Top 10 Most Influential Non-Skate Skate Shoes</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-l.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <small>Alina Wilson - October 17, 2018</small>
                        <h4 class="mt-1">Dont Go Barefoot: Skating the Top 10 Most Influential Non-Skate Skate Shoes</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="most-popu-area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="d-flex allign-items-center justify-content-between top-brdr">
                    <h3 class="text-uppercase">
                        <i class="fas fa-align-left"></i> Release Calendar</h3>
                    <h6>See All</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-m.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                    <!-- <p>Highest ASK</p> -->
                                <h1> <span class="ask">ASK:</span> $127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <small>14 oct, 2018</small>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center btn-area mt-4">
                            <button type="button" class="btn btn-dark">BID</button>
                            <button type="button" class="btn btn-outline-dark">Follow</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-n.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                    <!-- <p>Highest ASK</p> -->
                                <h1>
                                    <span class="ask">ASK:</span> $127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <small>14 oct, 2018</small>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center btn-area mt-4">
                            <button type="button" class="btn btn-dark">BID</button>
                            <button type="button" class="btn btn-outline-dark">Follow</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="most-popu">
                    <div class="most-popu-pic">
                        <img class="img-fluid" src="{{asset('assets/frontend/images/featured-o.png')}}" alt="">
                    </div>
                    <div class="most-popu-text">
                        <h4>Adidas Yeezy Boost 350 V2 Cream/Triple White</h4>
                        <div class="most-popu-text-btm">
                            <span class="most-popu-text-btm-lt">
                                    <!-- <p>Highest ASK</p> -->
                                <h1>
                                    <span class="ask">ASK:</span> $127</h1>
                            </span>
                            <span class="most-popu-text-btm-rt">
                                <small>14 oct, 2018</small>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center btn-area mt-4">
                            <button type="button" class="btn btn-dark">BID</button>
                            <button type="button" class="btn btn-outline-dark">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
