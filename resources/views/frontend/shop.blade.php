@include('frontend.include.header')
@foreach($shopBanner as $image)
    <div class="page-header section-start shop-header2" style="background-image: url( {{ url('public/images/' . $image['banner_image'])}} );">
@endforeach
        <h1>Shop</h1>

    </div>
    <div class="container">
        <div class="shop-page section-start">
            @foreach($shopBanner as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach

            <p class="head-text">Hats, t-shirts, tanks, sunglasses, sweatshirts and other goodies.</p>
        @foreach ($products as $product)    
            <div class="shop-wrapper">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('storage/app/public/images/'.$product->product_image) }}" />
                        </div>
                        <a href="#" class="Product-name">{{ $product->product_name }}</a>
                        <a href="#" class="product-price">{{ $product->product_price }}</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>

@include('frontend.include.footer')
<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "storage/app/public/images/" + image ;
    $(".shop-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
