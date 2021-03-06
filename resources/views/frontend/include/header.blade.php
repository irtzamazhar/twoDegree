<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url"           content="http://localhost/twodegree/blog" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Two Degrees" />
    <meta property="og:description"   content="A New Social World" />
    <meta property="og:image"         content="{{ asset('public/frontend/images/logo.png') }}" />
    <title>Two Degree</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.css') }}" />-->
    <link type="text/css" rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}" />
</head>

<body>
    <div class="header-nav section-start">
        <div class="container">
            <nav>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <div class="logo">
                       <a href="{{ url('/') }}">  <img src="{{ asset('public/frontend/images/logo.png') }}" /></a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        @foreach($header as $check)
                            <li><a href="{{ url($check['page_url']) }}">{{ $check['page_name'] }}</a></li>
                        @endforeach
                        @if(Request::is('shop*'))
                        <li><a href="{{ url('shop/view-cart') }}"><i class="fa fa-shopping-cart fa-2x"></i><span class="badge">
                        <?php //dd(Session::all()); ?>
                        @if(Session::get('cart') == null)    
                            0
                        @else
                            @foreach(Session::get('cart') as $items)
                                    {{ count($items) }}
                            @endforeach
                        @endif
                        </span></a></li>
                        @endif
                        
                        
                    </ul>
                </div>

            </nav>
        </div>
    </div>