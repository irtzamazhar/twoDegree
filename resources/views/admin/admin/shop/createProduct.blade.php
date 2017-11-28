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
                  <h3 class="box-title">Add Product</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('/createShopProduct') }}" method="post" id="blogpost" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter Product Name">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="productPrice">Product Price</label>
                                <input type="text" class="form-control" id="product-price" name="product-price" placeholder="Enter Product Price">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="productColor">Product Color</label>
                                <input type="text" class="form-control" id="product-color" name="product-color" placeholder="Eneter Product Color">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="productSize">Product Size</label>
                                <input type="text" class="form-control" id="product-size" name="product-size" placeholder="Enter Product Size">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="productQuantity">Product Quantity</label>
                                <input type="text" class="form-control" id="product-quantity" name="product-quantity" placeholder="Enter Product Quantity">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="salePrice">Sale Price</label>
                                <input type="text" class="form-control" id="sale-price" name="sale-price" placeholder="Enter Sale Price">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="productImage">Product Image</label>
                                <input type="file" class="form-control" id="product-image" name="product-image">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="productDesc">Product Description</label>
                                <textarea placeholder="Enter Product Description..." id="product-desc" rows="4" name="product-desc" class="form-control"></textarea>
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