@include('frontend.include.header')
@if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif
@foreach($shopBanner as $image)
    <div class="page-header section-start shop-header2">
@endforeach
        <h1>My Cart</h1>

    </div>
    <div class="container">
        <div class="shop-page section-start">
            @foreach($shopBanner as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
            @if(Session::get('cart') == null)    
                <p class="head-text"><?php echo Cart::content()->count(); ?> items in your cart</p>
            @else
                <a class="btn btn-danger pull-right" href="{{ route('empty-cart') }}">Empty Cart</a>
                <p class="head-text"><?php echo Cart::content()->count(); ?> items in your cart</p>
                @foreach ($cart as $cartItem)
                    <div class="shop-wrapper">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product-wrapper">
                                <div class="product-image">
                                    <img src="{{ asset('storage/app/public/images/'.$cartItem->options['image']) }}" />
                                </div>
                                <a href="{{ url('shop/shop-detail/'.$cartItem->options['slug']) }}">{{ $cartItem->name }}</a>
                                <a href="{{ url('shop/shop-detail/'.$cartItem->options['slug']) }}">${{ $cartItem->price }}</a>
                                <a>{{ $cartItem->qty }}</a>
                                <a href="{{ url('shop/remove-item/'.$cartItem->rowId) }}" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <td>Subtotal:</td>
                <td>$<?php echo Cart::subtotal(); ?></td>
                <br>
                <td>Tax:</td>
		<td>$<?php echo Cart::tax(); ?></td>
                <br>
                <td>Total:</td>
		<td>$<?php echo Cart::total(); ?></td>
                <a href="" class="btn btn-success pull-right">CheckOut</a>
            @endif
            
        
        </div>
       
    </div>

@include('frontend.include.footer')
<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "../storage/app/public/images/" + image ;
    $(".shop-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
