@extends('admin.layouts.dashboard')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Shop
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Shop</li>
          </ol>
        </section>
        
        <section class="invoice">
            <div>
                <div class="box-header">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <form action="{{ action('ShopController@update', $product->id) }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-6 {{ $errors->has('product-name') ? ' has-error' : '' }}">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="product-name" value="{{ $product->product_name }}" name="product-name" placeholder="Enter Product Name">
                                @if($errors->has('product-name'))
                                    <span class="help-block">{{ $errors->first('product-name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('product-price') ? ' has-error' : '' }}">
                                <label for="productPrice">Product Price</label>
                                <input type="text" class="form-control" id="product-price" value="{{ $product->product_price }}" name="product-price" placeholder="Enter Product Price">
                                @if($errors->has('product-price'))
                                    <span class="help-block">{{ $errors->first('product-price') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('product-color') ? ' has-error' : '' }}">
                                <label for="productColor">Product Color</label>
                                <input type="text" class="form-control" id="product-color" value="{{ $product->product_color }}" name="product-color" placeholder="Eneter Product Color">
                                @if($errors->has('product-color'))
                                    <span class="help-block">{{ $errors->first('product-color') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('product-size') ? ' has-error' : '' }}">
                                <label for="productSize">Product Size</label>
                                <input type="text" class="form-control" id="product-size" value="{{ $product->product_size }}" name="product-size" placeholder="Enter Product Size">
                                @if($errors->has('product-size'))
                                    <span class="help-block">{{ $errors->first('product-size') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('product-quantity') ? ' has-error' : '' }}">
                                <label for="productQuantity">Product Quantity</label>
                                <input type="text" class="form-control" id="product-quantity" value="{{ $product->product_quantity }}" name="product-quantity" placeholder="Enter Product Quantity">
                                @if($errors->has('product-quantity'))
                                    <span class="help-block">{{ $errors->first('product-quantity') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-6 {{ $errors->has('sale-price') ? ' has-error' : '' }}">
                                <label for="salePrice">Sale Price</label>
                                <input type="text" class="form-control" id="sale-price" value="{{ $product->product_sale_price }}" name="sale-price" placeholder="Enter Sale Price">
                                @if($errors->has('sale-price'))
                                    <span class="help-block">{{ $errors->first('sale-price') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-10 {{ $errors->has('product-image') ? ' has-error' : '' }}">
                                <label for="productImage">Product Image</label>
                                <input type="file" class="form-control" id="product-image" name="product-image">
                                @if($errors->has('product-image'))
                                    <span class="help-block">{{ $errors->first('product-image') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-xs-2">
                                <td>
                                    <img src="{{ asset('storage/app/public/images/'.$product->product_image) }}" alt="alt" width="80" height="100">
                                </td>
                            </div>
                            <div class="form-group col-xs-12 {{ $errors->has('product-desc') ? ' has-error' : '' }}">
                                <label for="productDesc">Product Description</label>
                                <textarea placeholder="Enter Product Description..." id="product-desc" rows="4" name="product-desc" class="form-control">{{ $product->product_desc }}</textarea>
                                @if($errors->has('product-desc'))
                                    <span class="help-block">{{ $errors->first('product-desc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="submit" value="Post" class="form-group btn btn-success btn-flat btn-md pull-right">
                                <a href="{{ url('admin/shop') }}" class="btn btn-primary btn-md btn-flat">Go Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </section>
      </div>      
      @stop