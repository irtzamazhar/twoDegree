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
                    <h3 class="box-title">View Product</h3>
                </div>
                  @include('admin.admin.message')
                  <table class="table table-striped view-any">
                    <tbody>
                        <tr>
                            <th>Product Name:</th>
                            <td><h1>{{ $product->product_name }}</h1></td>
                        </tr>
                        <tr>
                            <th>Product Price:</th>
                            <td><h1>{{ $product->product_price }}</h1></td>
                        </tr>
                        <tr>
                            <th>Product Color:</th>
                            <td><h1>{{ $product->product_name }}</h1></td>
                        </tr>
                        <tr>
                            <th>Product Description:</th>
                            <td>{{ $product->product_desc }}</td>
                        </tr>
                        <tr>
                            <th>Product Image:</th>
                            <td><img src="{{ asset('storage/app/public/images/'.$product->product_image) }}" width="215" height="215"/></td>
                        </tr>
                        <tr>
                            <th>Product Size:</th>
                            <td>{{ $product->product_size }}</td>
                        </tr>
                        <tr>
                            <th>Product Quantity:</th>
                            <td>{{ $product->product_quantity }}</td>
                        </tr>
                        <tr>
                            <th>Sale Price:</th>
                            <td>{{ $product->product_sale_price }}</td>
                        </tr>
                    </tbody>
                  </table>
                  @if(!Auth::guest())
                      <a href="{{ url('/admin/shop/editProduct/'.$product->id) }}" class="btn btn-warning btn-flat pull-right">Edit</a>
                      <a href="{{ url('/admin/shop/deleteProduct/'.$product->id) }}" class="btn btn-danger btn-dlt btn-flat pull-right" onclick="return confirm('Are you sure?')">Delete</a>
                  @endif
                  <a href="{{ url('admin/shop') }}" class="btn btn-primary btn-md btn-flat ">Go Back</a>
            </div>
        </section>
          
      </div>
      @stop