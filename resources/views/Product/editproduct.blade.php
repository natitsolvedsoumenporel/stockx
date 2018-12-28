@extends('layouts.app')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
                        <!-- INPUTS -->
                        <?php 
                        $url = 'admin/editproductsave/'.base64_encode($product->product_id);
                        ?>
                        {{ Form::model($product, array('url' => $url,'enctype'=> 'multipart/form-data')) }}
                        {{ csrf_field() }}
                        <div class="panel">
                            <?php $getcolor = explode(',', $product->color_id);
                            $getsize = explode(',', $product->size);
                            ?>
                            <div class="panel-heading">
                                <h3 class="panel-title">Product Edit</h3>
                            </div>
                            <div class="panel-body">
                                {{Form::label('p_name', 'Product Name')}}
                                {{ Form::text('p_name', null, array('class' => 'form-control' )) }}
                                <!-- <input type="text" class="form-control" placeholder="text field"> -->
                                <br>
                                {{Form::label('p_description', 'Product Description')}}
                                {{ Form::textarea('p_description', null, array('class' => 'form-control' )) }}
                                <br>
                                {{Form::label('cat_id', 'Category')}}
                                {{ Form::select('cat_id',  $catlists, null, ['class' => 'form-control', 'id' => 'categoryList']) }}
                                
                                <br>
                                {{Form::label('subcat_id', 'Subcategory')}}
                                {{ Form::select('subcat_id', $get_all_subcat, null, ['class' => 'form-control', 'id' => 'subcatList']) }}
                                
                                <br>
                                {{Form::label('brand_id', 'Brand')}}
                                {{ Form::select('brand_id',  $brandlists, null, ['class' => 'form-control']) }}
                                <br>
                                <label for="color_id">Color</label>
                                @foreach($colorlists as $color)
                                <input class="" name="color_id[]" type="checkbox" <?php if (in_array($color['color_name'], $getcolor)) { ?>checked<?php } ?> multiple="multiple" value="{{$color['color_name']}}">{{$color['color_name']}}
                                &nbsp;&nbsp;
                                @endforeach
                                <br>

                                {{Form::label('size_type', 'Size Type')}}
                                {{ Form::select('size_type',  $sizetypelists, null, ['class' => 'form-control', 'id' => 'sizeType']) }}
                                <br>
                                {{Form::label('size', 'Size')}}
                                <div id="sizeList">
                                @foreach($sizelists as $sizeval)
                                <input class="" name="size[]"  class="form-control" <?php if (in_array($sizeval['size_number'], $getsize)) { ?>checked<?php } ?> type="checkbox" multiple="multiple" value="{{$sizeval['size_number']}}">{{$sizeval['size_number']}}
                                &nbsp;&nbsp;
                                @endforeach
                                </div>
                                <br>

                                {{Form::label('price', 'Price')}}
                                {{ Form::text('price', null, array('class' => 'form-control' )) }}
                                <br>
                                <label for="image">Image</label>
                                <input name="image[]" type="file" class="form-control" multiple="multiple">
                                <br>
                                                              
                                
                                <label for="is_active">Status</label>
                                <input class="" name="is_active" <?php if($product->is_active == 1){ ?>checked<?php }?> id="is_active" type="checkbox">
                                <br>
                               
                                
                                {{Form::submit('Save',array('class'=>'btn text-center'))}}
                            </div>
                            
                        </div>
                        {{ Form::close() }}
                        <!-- END INPUTS -->
					</div>
				</div>
			</div>


<script type="text/javascript">
$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#categoryList").click(function(){
        var parent_id = $(this).val();
        if(parent_id == 0){
            return false;
        }
        // alert(parent_id); return false; HomeController
        $.ajax({
            url:base_url+"/get_subcat",
            type:"post",
            dataType:'json',
            data:{_token: CSRF_TOKEN, parent_id:parent_id},
            success:function(data){
                console.log(data);
                if(data.ack == 1){
                    $("#subcatList").html(data.htm);
                }

            }
        });
    });

    $("#sizeType").click(function(){
        var size_type_id = $(this).val();
        if(size_type_id == 0){
            return false;
        }
        // alert(size_type_id); return false;
        $.ajax({
            url:base_url+"/get_subsizelist",
            type:"post",
            dataType:'json',
            data:{_token: CSRF_TOKEN, size_type_id:size_type_id},
            success:function(data){
                console.log(data);
                if(data.ack == 1){
                    $("#sizeList").html(data.htm);
                }

            }
        });
    });
});
</script>
@endsection

