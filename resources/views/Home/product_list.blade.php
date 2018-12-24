@extends('layouts.search')

@section('content')
	<section class="search-banner">
		<div class="container">
			<div class="row mt-5">
				<div class="col-lg-6 col-md-6 px-0 text-left">					
					<h3>PRODUCTS</h3>

				</div>
			</div>
		</div>
	</section>
        <section class="container page-breabcrumb mt-4">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                  <li><i class="fa fa-angle-right mx-3"></i></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
              </ol>
            </nav>
        </section>
        <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-6 mb-5">
                <form id="search_product" method="post">
<!--                <section class="list-leftbar">
                    <h5>CATEGORIES</h5>
                    <div class="custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">SNEAKERS</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2">STREETWEAR</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3">
                      <label class="custom-control-label" for="customCheck3">HANDBAGS</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4">
                      <label class="custom-control-label" for="customCheck4">WATCHES</label>
                    </div>
                </section>
                
                <section class="list-leftbar mt-4">
                    <h5>SIZE TYPES</h5>
                    <div class="custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="customCheck5">
                      <label class="custom-control-label" for="customCheck5">Men</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck6">
                      <label class="custom-control-label" for="customCheck6">Women</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck7">
                      <label class="custom-control-label" for="customCheck7">Clild</label>
                    </div>
                     <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck8">
                      <label class="custom-control-label" for="customCheck8">Preschool</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck9">
                      <label class="custom-control-label" for="customCheck9">Infant</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck11">
                      <label class="custom-control-label" for="customCheck11">Toddler</label>
                    </div>
                </section>-->
                
                <section class="left-size mt-4">
                    <label for="cat_id">Categories</label>
                    <select class="form-control search_class" name="cat_id" id="cat_id">
                        <option value="">Select your size</option>
                        <?php foreach($categories as $ckey => $cval){ ?>
                        <option value="<?php echo $cval['cat_id'];  ?>"><?php echo $cval['category_name'];  ?></option>
                        <?php } ?>
                      
                    </select>
                </section>
                <section class="left-size mt-4">
                    <label for="subcat_id">Subcategory</label>
                    <select class="form-control search_class" name="subcat_id" id="subcat_id">
                      <option value="">Select your size</option>
                    </select>
                </section>
                <section class="left-size mt-4">
                    <label for="brand_id">Brands</label>
                    <select class="form-control search_class" name="brand_id" id="brand_id">
                        <option value="">Select your brand</option>
                      <?php foreach($brands as $bkey => $bval){ ?>
                        <option value="<?php echo $bval['id'];  ?>"><?php echo $bval['brand_name'];  ?></option>
                        <?php } ?>
                    </select>
                </section>
                <section class="left-size mt-4">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" placeholder="Product name" name="product_name"/>
                </section>
                <section class="left-size mt-4">
                    <label for="brand_id">Colors</label>
                    <select class="form-control search_class" name="color_id" id="color_id">
                        <option value="">Select your color</option>
                      <?php foreach($colors as $colkey => $colval){ ?>
                        <option value="<?php echo $colval['id'];  ?>"><?php echo $colval['color_name'];  ?></option>
                        <?php } ?>
                    </select>
                </section>
                
                <section class="left-size mt-5">
                    <div class="slidecontainer">
                      <label for="exampleFormControlSelect1">Price</label>
                        <div id="mobile" class="range-example-single"></div>
                        <input type="hidden" class="form-control" name="minprice" id="minprice">
                        <input type="hidden" class="form-control" name="maxprice" id="maxprice">
                      <!--<input type="range" min="2" max="100" value="50" class="slider" id="myRange">-->
                    </div>
                </section>
                
<!--                <section class="left-size mt-5">
                    <label for="exampleFormControlSelect1">RELEASE YEARS</label>
                    <select class="form-control">
                      <option>Select year</option>
                    </select>
                </section>-->
                </form>
            </div>
            
            <div class="col-lg-9 col-6 mb-5" >
                
                <div id="btnContainer" class="left-top mb-3">
                <div class="row align-items-center">
                    <div class="col-5">
                            <button class="btns" id="list-btn"><i class="fa fa-list-ul"></i></button> 
                            <button class="btns active" id="grid-btn"><i class="fa fa-th"></i> </button>
                    </div>

                    <div class="col-3" >
                        <div class="left-view" style="display: none">
                                <div class="form-group row mb-0">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">View</label>
                                    <div class="col-sm-8 pl-0">
                                      <select class="form-control">
                                          <option>9</option>
                                          <option>8</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                    <div class="col-4" style="float:right">
                            <div class="left-view">
                                <div class="form-group row mb-0">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Sort By</label>
                                    <div class="col-sm-8 pl-0">
                                      <select class="form-control">
                                          <option>Featured</option>
                                          <option>Most Popular</option>
                                          <option>New Lowest Asks</option>
                                          <option>New Highest Bids</option>
                                          <option>Avg Sales Price</option>
                                          <option>Total Sold</option>
                                          <option>Volatility</option>
                                          <option>Price Premium</option>
                                          <option>Last Sale</option>
                                          <option>Lowest Ask</option>
                                          <option>Highest Bid</option>
                                          <option>Release date</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <div id="search-result">
                <div class="row">
                    <div class="column">
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
                    <div class="column">
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
                    <div class="column">
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
               </div>
                
                <div class="row">
                      <div class="column">
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
                      <div class="column">
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
                      <div class="column">
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
               </div>
                
                <div class="row">
                      <div class="column">
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
                      <div class="column">
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
                      <div class="column">
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
               </div>
                </div>
                
                
        </div>
            
       </div>
        
    </div>

<script type="text/javascript">
    
    $(document).ready(function(){
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $("#list-btn").click(function(){
            $(".column").addClass('list-column');
        });
        $("#grid-btn").click(function(){
            $(".column").removeClass('list-column');
        }); 
        
        $("#cat_id").change(function(){
            var parent_id = $(this).val();
            if(parent_id == 0){
                return false;
            }
            //alert(parent_id); return false;
            $.ajax({
                url:base_url+"/get_subcat",
                type:"post",
                dataType:'json',
                data:{_token: CSRF_TOKEN, parent_id:parent_id},
                success:function(data){
                    //console.log(data); return false;
                    if(data.ack == 1){
                        $("#subcat_id").html(data.htm);
                    }

                }
            });
        });
        
        
        $(".search_class").change(function(){
            call_ajax();
//            $.ajax({
//                url:base_url+"/product_search",
//                type:"post",
//                dataType:'json',
//                data:$("#search_product").serialize(),
//                success:function(data){
//                   console.log(data); return false;
//                    if(data.ack == 1){
//                        $("#subcat_id").html(data.htm);
//                    }
//
//                }
//            });
        });
        $("#product_name").keyup(function(){
            call_ajax();
            
        });
        
        
        
        $(".range-example-single").asRange({
            step: 20,
            range: true,
            limit: true,
            min: 0,
            max: 1000,
            format: function(value) {
            return '$' + value;
            },
            onChange: function(value) {
            $("#minprice").val(value[0]);
            $("#maxprice").val(value[1]);
            
             call_ajax();
            }
        });
    });
    function call_ajax(){
        $.ajax({
                url:base_url+"/product_search",
                type:"post",
                dataType:'json',
                data:$("#search_product").serialize(),
                success:function(data){
                   //console.log(data); return false;
                    if(data.ack == 1){
                        $("#search-result").html(data.htm);
                    }else{
                        $("#search-result").html(data.htm);
                    }

                }
            });
    }
</script>	
@endsection