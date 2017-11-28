@include('frontend.include.header')
    <div class="page-header section-start shop-header">
        <h1>Shop</h1>

    </div>
    <div class="container">
        <div class="shop-page section-start">

            <p class="head-text">Hats, t-shirts, tanks, sunglasses, sweatshirts and other goodies.</p>
            <div class="shop-wrapper">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/hatlogo1.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Skateboard Hat</a>
                        <a href="#" class="product-price">$19.99</a>
                    </div>


                </div>
                  <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/tank.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Excercise Tank Top</a>
                        <a href="#" class="product-price">$24.99</a>
						<div class="sale">
							<p>SALE</p>
						</div>
                    </div>


                </div>
                  <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/logotshirt.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Fitted T-Shirt</a>
                        <a href="#" class="product-price">$24.99</a>
                    </div>


                </div>
                  <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/hatlogo2.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Skateboard Hat</a>
                        <a href="#" class="product-price">$19.99</a>
                    </div>


                </div>
                 <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/logosunblue.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Sunglasses Blue</a>
                        <a href="#" class="product-price">$4.99</a>
                    </div>


                </div>
                 <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product-wrapper">
                        <div class="product-image">
                            <img src="{{ asset('public/frontend/images/logosunpink.png') }}"/>
                        </div>
                        <a href="#" class="Product-name">Logo Sunglasses Pink</a>
                        <a href="#" class="product-price">$4.99</a>
                    </div>


                </div>

            </div>
        </div>

    </div>

@include('frontend.include.footer')
</body>
