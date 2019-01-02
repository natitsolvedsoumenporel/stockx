@extends('layouts.search')

@section('content')
<?php //print_r($fetch_details); ?>
<section class="container page-breabcrumb mt-p" style="margin-top: 105px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
            <li><i class="fa fa-angle-right mx-3"></i></li>
            <li class="breadcrumb-item" aria-current="page">Product</li>
            <li><i class="fa fa-angle-right mx-3"></i></li>
            <li class="breadcrumb-item active" aria-current="page">{{$fetch_details['p_name']}}</li>
        </ol>
    </nav>
</section>
<div class="container my-5">

    <div class="row my-5 ">

        <div class="col-lg-6 col-12">
<?php //print_r($fetch_details); exit; ?>
            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails is-ready">
                @if(!empty($fetch_details['imagepath']))
                <a href="{{URL::to('/').'/'.$fetch_details['imagepath'][0]['originalpath']}}">
                    <img src="{{URL::to('/').'/'.$fetch_details['imagepath'][0]['originalpath']}}" class="img-fluid" alt="" width="542" height="542">
                </a>
                @else

                <a href="images/featured-d.png">

                    <img src="{{asset('assets/frontend/images/featured-d.png')}}" class="img-fluid" alt="" width="542" height="542">
                </a>
                @endif
            </div>
            <ul class="thumbnails">
                @if(!empty($fetch_details['imagepath']))
                <?php foreach($fetch_details['imagepath'] as $dkey => $dval){ //print_r($dval); ?>
                <li>
                    <a href="{{URL::to('/').'/'.$dval['originalpath']}}" data-standard="{{URL::to('/').'/'.$dval['originalpath']}}">
                        <img src="{{URL::to('/').'/'.$dval['originalpath']}}" alt="">
                    </a>
                </li>
                <?php } ?>
                @else
                <li>
                    <a href="images/featured-d.png" data-standard="{{asset('assets/frontend/images/featured-d.png')}}">
                        <img src="{{asset('assets/frontend/images/featured-d.png')}}" alt="">
                    </a>
                </li>
                @endif<!--
                <li>
                    <a href="images/details-img1.jpg" data-standard="{{asset('assets/frontend/images/details-img1.jpg')}}">
                        <img src="{{asset('assets/frontend/images/details-img1.jpg')}}" alt="">
                    </a>
                </li>-->
            </ul>

        </div>

        <div class="col-lg-6 col-12">

            <div class="details-text">
                <h2>{{$fetch_details['p_name']}}</h2> 
                <h6 class="my-3">Release Date:  <?php echo date("j F, Y", strtotime($fetch_details['created_at'])); ?></h6>
                <p>{{$fetch_details['p_description']}}</p>
                <div class="d-flex align-items-center mt-4">
                    <label for="exampleFormControlSelect1">Select Size</label>
                    <select class="form-control">
                        <option>All</option>
                        <?php foreach($sizelists as $sizekey => $sizeval){ //print_r($sizeval) ?>
                        <option value="<?php echo $sizeval['size_number']; ?>"><?php echo $sizeval['size_number']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <h6 class="mt-4">Last Sale <span>$<?php echo $fetch_details['price']; ?></span><i class="fa fa-level-up-alt"></i>+$<?php echo $fetch_details['price'] -(($fetch_details['price']*$fetch_details['sellpercentage'])/100); ?>(<?php echo $fetch_details['sellpercentage']; ?>%)</h6>
                <div class="size d-flex align-items-center">
                    <p>Size: <?php echo $sizelists[0]['size_number']; ?> </p>
                    <div class="line"></div>
                    <!--<a href="{{URL::to('/').'/allsize/'.$fetch_details['pro_uni_id']}}">View All Size</a>-->
                    <a href="#">View All Size</a>
                </div>

                <div class="row mt-5 justify-content-between">
                    <div class="col-lg-4 col-6 pl-0">
                        <div class="text-center">
                            <h2>$<?php echo $fetch_details['highestbid']; ?></h2>
                            <h6 class="mb-3">Highest Bid</h6>
                            <a href="/bid_sell/<?php echo $fetch_details['pro_uni_id']; ?>" class="size-bt">SELL <i class="fa fa-long-arrow-alt-right"></i></a>
                            <div class="size sm d-flex align-items-center mt-2">
                                <p>Size: 11 </p>
                                <div class="line"></div>
                                <a href="#">View All Sales</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="text-center">
                            <h2>$<?php echo $fetch_details['lowestask']; ?></h2>
                            <h6 class="mb-3">Lowest Ask</h6>
                            <a href="/bid_buy/<?php echo $fetch_details['pro_uni_id']; ?>" class="size-bt active">BUY <i class="fa fa-long-arrow-alt-right"></i></a>
                            <div class="size sm d-flex align-items-center mt-2">
                                <p>Size: 11 </p>
                                <div class="line"></div>
                                <a href="#">View All Sales</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row grey-bt mt-5">
                    <a href="{{URL::to('/').'/'.$fetch_details['fblink']}}" class="mr-lg-3"><i class="fa fa-share-alt"></i>FACEBOOK</a>
                    <a href="{{URL::to('/').'/'.$fetch_details['twitterlink']}}" class="mr-lg-3"><i class="fa fa-share-alt"></i>TWITTER</a>
                    <a href="{{URL::to('/').'/'.$fetch_details['pinterest']}}"><i class="fa fa-share-alt"></i>PINTERST</a>
                </div>

                <div class="row mt-5 size sm">
                    <div class="col-6">
                        <p>STYLE <?php echo $fetch_details['pro_uni_id']; ?> </p>
                        <p>RETAIL PRICE $<?php echo $fetch_details['price']; ?></p>
                        <p>TRADE RANGE (12 MOS.)$<?php echo $fetch_details['trade_range_high']; ?> - $<?php echo $fetch_details['trade_range_low']; ?></p>
                    </div>
                    <div class="col-6">
                        <p>COLORWAY <?php echo $fetch_details['color_id']; ?></p>
                        <p>52 WEEK HIGH $230 | LOW $66 </p>
                        <p>VOLATILITY<?php echo $fetch_details['volatility']; ?>%</p>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="row my-5 related-product border-top">
        <div class="col-lg-12 col-md-12 pt-4">
            <div class="d-flex allign-items-center justify-content-between top-brdr">
                <h3 class=" text-uppercase">
                    <i class="fas fa-align-left"></i> Our Services</h3>
                <h6>SEE ALL</h6>
            </div>					
        </div>
        <?php foreach($get_related_product as $pkey => $pval){ //print_r($pval); ?>
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
                    @if(!empty($pval['imagepath']))
                    <img class="img-fluid" src="{{URL::to('/').'/'.$pval['imagepath'][0]['originalpath']}}" alt="">														
                    @else
                    <img class="img-fluid" src="{{asset('assets/frontend/images/featured-d.png')}}" alt="">														
                    @endif
                </div>
                <div class="most-popu-text">
                    <h5 ><a style="color: black" href="details/<?php echo $pval['pro_uni_id']; ?>"><?php echo $pval['p_name'] ?></a></h5>
                    <div class="most-popu-text-btm">
                        <span class="most-popu-text-btm-lt detail">
                            <p>LOWEST ASK</p>
                            <h1>$<?php echo $pval['lowestask'] ?></h1>
                        </span>
                        <span class="most-popu-text-btm-rt">
                            <h6>$<?php echo $pval['price'] ?> Sold</h6>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
<!--        <div class="col-lg-4 col-md-4 col-sm-12">
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
                        <span class="most-popu-text-btm-lt detail">
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
                        <span class="most-popu-text-btm-lt detail">
                            <p>LOWEST ASK</p>
                            <h1>$127</h1>
                        </span>
                        <span class="most-popu-text-btm-rt">
                            <h6>$600 Sold</h6>
                        </span>
                    </div>
                </div>
            </div>
        </div>-->
    </div>

</div>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	 <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
    <script src="{{asset('assets/frontend/js/jquery.bxslider.js')}}"></script> 
    
     <!-- <script>
    	$(document).ready(function(){
			$('.bxslider').bxSlider({
			    mode: 'horizontal',
			    controls: false,
			    minSlides: 1,
				maxSlides: 6,
				slideWidth: 236,
				slideMargin: 18
			  });
    	});
	</script> -->
	


<script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $(".fixed-top").addClass("fixed-me");
            } else {
                $(".fixed-top").removeClass("fixed-me");
            }
        });
    </script>
      
<script>
    $(document).ready(function(){
        $("#list-btn").click(function(){
            $(".column").addClass('list-column');
        });
        $("#grid-btn").click(function(){
            $(".column").removeClass('list-column');
        });
        
    });
</script>
      
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
<script src="//www.google-analytics.com/ga.js"></script>
<script>
    var _gaq=[['_setAccount','UA-2508361-9'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<script src="dist/easyzoom.js"></script>
<script>
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	</script>
@endsection

