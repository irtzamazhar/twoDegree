<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Two Degree</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.css') }}" />
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
                        <li><a href="{{ url('/app-download') }}"> App</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>