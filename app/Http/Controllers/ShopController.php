<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ShopProducts;
use App\SiteBanner;
use Cart;
use App\Checkout;
use Stripe\{Stripe, Charge};
use File;
use DB;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ShopProducts::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.shop.index', compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.shop.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the event
        $this->validate($request, [
            'product-name' => 'required',
            'product-price' => 'required',
            'product-color' => 'nullable',
            'product-size' => 'nullable',
            'product-quantity' => 'nullable',
            'sale-price' => 'nullable',
            'product-image' => 'required|image|nullable|max:1999',
            'product-desc' => 'nullable',
        ],[
            'product-name.required' => 'Product Name Must Be Entered',
            'product-price.required' => 'Product Price Must Be Entered',
            'product-image.required' => 'Product Image Must Be Entered',
            'product-image.image' => 'Must Be An Image',
        ]);
        
//        dd($val);
        
        // Handle file upload
        if ($request->hasFile('product-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('product-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('product-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('product-image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Create Product
        $product = new ShopProducts;
        $product->product_name = $request->input('product-name');
        $product->product_price = $request->input('product-price');
        $product->product_color = $request->input('product-color');
        $product->product_desc = $request->input('product-desc');
        $product->product_size = $request->input('product-size');
        $product->product_image = $fileNameToStore;
        $product->product_quantity = $request->input('product-quantity');
        $product->product_sale_price = $request->input('sale-price');
        $slug = SlugService::createSlug(ShopProducts::class, 'slug', $product->product_name);
        $newProduct = $product->replicate();
        $product->save();
        
        $request->session()->flash('success', 'Product added!');
        
        return redirect('/admin/shop/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ShopProducts::find($id);
        return view('admin.admin.shop.showProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ShopProducts::find($id);
        return view('admin.admin.shop.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the event
        $this->validate($request, [
            'product-name' => 'required',
            'product-price' => 'required',
            'product-color' => 'nullable',
            'product-size' => 'nullable',
            'product-quantity' => 'nullable',
            'sale-price' => 'nullable',
            'product-image' => 'image|nullable|max:1999',
            'product-desc' => 'nullable',
        ],[
            'product-name.required' => 'Product Name Must Be Entered',
            'product-price.required' => 'Product Price Must Be Entered',
            'product-image.image' => 'Must Be An Image',
        ]);
        
        // Handle file upload
        if ($request->hasFile('product-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('product-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('product-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('product-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Edit Product
        $product = ShopProducts::find($id);
        File::delete("storage/app/public/images/$product->product_image");
        if($request->hasFile('product-image')){
            $product->product_image = $fileNameToStore;            
        }
        $product->product_name = $request->input('product-name');
        $product->product_price = $request->input('product-price');
        $product->product_color = $request->input('product-color');
        $product->product_desc = $request->input('product-desc');
        $product->product_size = $request->input('product-size');       
        $product->product_quantity = $request->input('product-quantity');
        $product->product_sale_price = $request->input('sale-price');
        $product->slug = null;
        $product->save();
        
        $request->session()->flash('success', 'Product Details Updated!');
        
        return redirect('/admin/shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ShopProducts::find($id);

        $product->delete();
        return redirect('/admin/shop')->with('danger', 'Product Removed!');
    }
    
    public function addBanner() {
        $siteBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        return view('admin.admin.shop.addShopBanner', ['siteBanner' => $siteBanner])->render();
    }
    
    public function storeBanner(Request $request, $id)
    {        
        // Validate the banner image
        $this->validate($request, [
            'banner-image' => 'required|image|nullable|max:1999',
        ], [
            'banner-image.required' => 'Image is Required',
            'banner-image.image' => 'Must be an Image.',
        ]);
        
        // Handle file upload
        if ($request->hasFile('banner-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('banner-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('banner-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('banner-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Create Shop Banner
        $shopBanner = SiteBanner::find($id);
        File::delete("storage/app/public/images/$shopBanner->banner_image");
        if($request->hasFile('banner-image')){
            $shopBanner->banner_image = $fileNameToStore;            
        }
        $shopBanner->page_name = $request->input('page-name');
        $shopBanner->save();
        
        $request->session()->flash('success', 'Banner added successfully!');
        return redirect('/admin/shop/addShopBanner');
    }
    
    public function shop()
    {
        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        $products = ShopProducts::orderBy('created_at', 'desc')->paginate(5);
        $data = array(
            'products' => $products,
            'shopBanner' => $shopBanner,
            
        );
        return view('frontend.shop.index', $data)->render();
    }
    
    public function shopDetail($slug)
    {
        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        $productss = DB::table('shop_products')->where('slug', '=', $slug)->get();
        
        $data = array(
            'productss' => $productss,
            'shopBanner' => $shopBanner,
            
        );
//        dd($data);
        return view('frontend.shop.shop-detail', $data)->render();
    }
    
    public function addToCart(Request $request, $id) {
        $product = ShopProducts::find($id);
        $this->validate($request, [
            'qty' => 'required',
        ], [
            'qty.required' => 'Quantity is Required.',
        ]);
        $price = str_replace("$", "", $product->product_price);
        $var = Cart::add(['id' => $id,
            'name' => $product->product_name,
            'qty' => $request->input('qty'),
            'price' => $price,
            'options' => [
                'image' => $product->product_image,
                'slug' => $product->slug
            ]
        ]);
        return redirect('/shop/view-cart')->with('success', 'Product Added in Your Cart!');
    }
    
    public function getCart() {
//        $rowId = 'a775bac9cff7dec2b984e023b95206aa';
//        $var = Cart::get($rowId);
//        $var = Cart::remove($rowId);
        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        $cart = Cart::content();
//        $count = Cart::content()->count();
        $data = array(
            'cart' => $cart,
            'shopBanner' => $shopBanner,
//            'count' => $count,
        );
        return view('frontend.shop.view-cart', $data)->render();        
    }
    
    public function removeCart() {
        $var = Cart::destroy();
        return redirect('/shop')->with('error', 'Cart is Empty Now');
    }
    
    public function removeCartItem($rowId) {
        Cart::remove($rowId);
        return redirect('shop/view-cart')->with('error', 'Item is removed');
    }
    
    public function updateCart($rowId) {
        $rowId = 'a775bac9cff7dec2b984e023b95206aa';
        $var = Cart::update($rowId, 10); // Will update the quantity
        echo 'Cart is updated';
    }
    
    public function checkOut() {
        return view('frontend.shop.checkout');
    }
    
    public function postCheckOut(Request $request) {
        $this->validate($request, [
            'check' => 'required',
        ]);
        $check = $request->input('check');
        $subtotal = $request->input('subtotal');
        $tax = $request->input('tax');
        $total = $request->input('total');
        return view('frontend.shop.checkout', compact('check', 'subtotal', 'tax', 'total'));
    }
    
    public function postPaymentMethod(Request $request) {
//        dd($request->all());
        $this->validate($request, [
            'method' => 'required',
            'full-name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street-address' => 'required'
        ],[
            'full-name.required' => "You Must Provide Your Name.",
            'email.required' => "You Must Provide Your Email.",
            'phone.required' => "You Must Provide Your Phone Number.",
            'street-address.required' => "You Must Provide Your Street Address."
        ]);
        
        $payment = new Checkout;
        $payment->full_name = $request->input('full-name');
        $payment->email = $request->input('email');
        $payment->phone = $request->input('phone');
        $payment->street_address = $request->input('street-address');
        $payment->method = $request->input('method');
        $payment->subtotal = $request->input('subtotal');
        $payment->tax = $request->input('tax');
        $payment->total = $request->input('total');
        $payment->save();
        if($request->input('method') == 'card'){
            $total = $payment->total;
            return view('frontend.shop.payment', compact('total'));
        } else if($request->input('method') == 'paypal') {
            $total = $payment->total;
            return view('frontend.shop.payMoney', compact('total'));
        }
    }
    
    public function stripePayment() {
        return view('frontend.shop.payment');
    }
    
    public function paycash(Request $request) {
        Stripe::setApiKey('sk_test_Nn2vVL9o3kq9aoe03stzjqr7');
        
        try {
            Charge::create ( array (
                    "amount" => $request->input('total') * 100,
                    "currency" => "usd",
                    "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                    "description" => "Test payment." 
            ));
        } catch ( \Exception $e ) {
            return redirect()->route('stripe-payment')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('shop')->with('success', 'Succesfully purchased.');
    }
    
//    public function addToCart(Request $request, $id)
//    {
////        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
//        $product = ShopProducts::find($id);
//        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        $cart = new Cart($oldCart);
//        $cart->add($product, $product->id);
//        
//        $request->session()->put('cart', $cart);
////        dd(Session::get('cart')->totalQty);
//        dd($request->session()->get('cart'));
//        
//        return view('frontend.shop-detail', $data)->render();
//    }
}
