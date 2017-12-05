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
            <div class="">
                <div class="box-header">
                  <a class="btn btn-success btn-flat btn-md pull-right btn-create" href="{{ url('admin/shop/createProduct') }}">Add A New Product</a>
                  <a class="btn btn-primary btn-flat btn-md pull-left" href="{{ url('admin/shop/addShopBanner') }}">Shop Banner</a>
                </div>
                  @include('admin.admin.message')
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="table-layout: fixed;">
                        <thead>
                          <tr>
                            <th width="10%">Name</th>
                            <th width="10%">Price</th>
                            <th width="10%">Color</th>
                            <th width="20%">Description</th>
                            <th width="10%">Image</th>
                            <th width="10%">Size</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                  <td>{{ $product->product_name }}</td>
                                  <td>{{ $product->product_price }}</td>
                                  <td>{{ $product->product_color }}</td>
                                  <td>
                                      @php $truncated = str_limit( $product->product_desc , 25); @endphp
                                    {!! $truncated !!}
                                  </td>
                                  <td>
                                      <img src="{{ asset('storage/app/public/images/'.$product->product_image) }}" width="60" height="80">
                                  </td>
                                  <td>{{ $product->product_size }}</td>
                                  <td>{{ $product->product_quantity }}</td>
                                  <td>
                                      @if(!Auth::guest())
                                          <a href="{{ url('/admin/shop/showProduct/'.$product->id) }}" class="btn btn-primary btn-flat">View</a>
                                          <a href="{{ url('/admin/shop/editProduct/'.$product->id) }}" class="btn btn-warning btn-flat">Edit</a>
                                          <a href="{{ url('/admin/shop/deleteProduct/'.$product->id) }}" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure?')">Delete</a>
                                      @endif
                                  </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </section>
          
      </div>
      @stop

