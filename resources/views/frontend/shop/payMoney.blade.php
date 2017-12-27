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
                <div class="panel-heading">Paywith Paypal</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{ route('postPaypal') }}" >
                        {{ csrf_field() }}                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="amount" value="{{ $total }}">
                                <button type="submit" class="btn btn-primary">
                                    Proceed To Paypal
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