@include('frontend.include.header')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading">Enter Your Shipping Address</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="checkout-form" role="form" action="{{ route('postPaymentMethod') }}" >
                        {{ csrf_field() }}
                        <?php //dd($check); ?>
                        <input type="hidden" name="method" value="{{ $check }}">
                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        <input type="hidden" name="tax" value="{{ $tax }}">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <div class="form-group{{ $errors->has('full-name') ? ' has-error' : '' }}">
                            <label for="fullName" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="full-name" type="text" placeholder="Enter Your Full Name" class="form-control" name="full-name" value="{{ old('full-name') }}" autofocus>
                                @if ($errors->has('full-name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter Your Email Address" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" placeholder="Enter Your Phone Number" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('street-address') ? ' has-error' : '' }}">
                            <label for="streetAddress" class="col-md-4 control-label">Street Address</label>
                            <div class="col-md-6">
                                <input id="street-address" type="text" placeholder="Enter Your Street Address" class="form-control" name="street-address" value="{{ old('street-address') }}" autofocus>
                                @if ($errors->has('street-address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street-address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.include.footer')