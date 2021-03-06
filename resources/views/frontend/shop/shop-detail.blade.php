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
        <h1>Shop</h1>

    </div>
    <div class="container">
        <div class="shop-page section-start">
            @foreach($shopBanner as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
        @foreach ($productss as $product)

            <div class="shop-wrapper">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('storage/app/public/images/'.$product->product_image) }}" />
                        </div>
                        <a>{{ $product->product_name }}</a>
                        <a>{{ $product->product_price }}</a>
                        <form method="post" action="{{ url('shop/add-to-cart/'.$product->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $product->product_image }}">
                            <input type="hidden" value="{{ $product->product_name }}">
                            <input type="hidden" value="{{ $product->product_price }}">
                            <input type="number" name="qty" id="qty">
                            <button type="submit" class="btn btn-success" >Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>

@include('frontend.include.footer')
<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "../../storage/app/public/images/" + image ;
    $(".shop-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
