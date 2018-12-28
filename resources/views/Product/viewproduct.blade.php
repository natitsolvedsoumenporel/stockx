@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Product Details</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('p_name', 'Product Name')}}: {{$product['p_name']}}
                               
                                <br>
                                {{Form::label('product_description', 'Product Description')}}: {{$product['p_description']}}
                               
                                <br>
                                {{Form::label('parentcategory', 'Category Name')}}: {{$product['parentcategory']['category_name']}}
                                
                                <br>
                                {{Form::label('childcategory', 'Subcategory Name')}}: {{$product['childcategory']['category_name']}}
                                
                                <br>
                                {{Form::label('brandname', 'Brand')}}: {{$product['brandname']['brand_name']}}
                                
                                <br>
                                {{Form::label('color_id', 'Color')}}: {{$product['color_id']}}
                                
                                <br>
                                
                                {{Form::label('sizetypename', 'Size type')}}: {{$product['sizetypename']['size_name']}}
                                
                                <br>
                                
                                {{Form::label('size', 'Size')}}: {{$product['size']}}
                                

                                <br>
                                {{Form::label('price', 'Price')}}: {{$product['price']}}
                                <br>
                                @if(!empty($product['imagepath']))
                                {{Form::label('image', 'Product Image')}}
                                @foreach($product['imagepath'] as $pimg)
                                <img height="150px" width="150px" src="{{URL::to('/').'/'.$pimg['originalpath']}}" alt="" >
                                @endforeach
                                <br>
                                @endif
                                <br>
                                
                                
                                
                                
                                <label for="is_active">Status</label>: @if($product['is_active'] == 1) Active @else Inactive @endif
                                <br>
                                
                                
                            </div>
                            
                        </div>
                        
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>
@endsection

