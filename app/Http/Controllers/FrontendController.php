<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteEvent;
use App\Faq;
use App\Page;
use App\Menu;
use App\SiteBanner;
use App\HomePage;
use App\ShopProducts;
use Cart;
use Stripe\{Stripe, Charge};
use DB;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $topSection = HomePage::where('section_name', '=' , 'Top Section')->get()->toArray();
        $middleSection = HomePage::where('section_name', '=' , 'Middle Section')->get()->toArray();
        $bottomSection = HomePage::where('section_name', '=' , 'Bottom Section')->get()->toArray();
        $data = array(
            'topSection' => $topSection,
            'middleSection' => $middleSection,
            'bottomSection' => $bottomSection,
        );
    	return view('frontend.index', $data)->render();
    }

    public function app()
    {
    	return view('frontend.app-download');
    }

    public function blog()
    {
        $siteBanner = SiteBanner::where('page_name', '=', 'blog')->get()->toArray();
    	$blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blog', ['blogs' => $blogs], ['siteBanner' => $siteBanner])->render();
    }

    public function blogDetail($slug)
    {
        $siteBanner = SiteBanner::where('page_name', '=', 'blog')->get()->toArray();
        $blogss = DB::table('blogs')->where('slug', $slug)->get();
        $data = array(
            'blogss' => $blogss,
            'siteBanner' => $siteBanner
        );
        return view('frontend.blog-detail', $data)->render();
    }

    public function faq()
    {
        $faqImage = SiteBanner::where('page_name', '=', 'faq')->get()->toArray();
        $faqs = DB::table('faqs')->where('faq_status', 1)->orderBy('created_at', 'asc')->get();
        $data = array(
            'faqs' => $faqs,
            'faqImage' => $faqImage
        );
        
        return view('frontend.faq', $data)->render();
    }

    public function contact()
    {
        $contactImage = SiteBanner::where('page_name', '=', 'contact')->get()->toArray();
        $data = array(
            'contactImage' => $contactImage
        );
        return view('frontend.contact', $data)->render();
    }
    
    public function events()
    {
        $eventImage = SiteBanner::where('page_name', '=', 'event')->get()->toArray();
        $events = SiteEvent::orderBy('created_at', 'desc')->paginate(5);
        $data = array(
            'events' => $events,
            'eventImage' => $eventImage
        );
        
        return view('frontend.events', $data)->render();
    }
    
    public function eventDetail($slug)
    {
        $eventss = DB::table('site_events')->where('slug', $slug)->get();
        $eventImage = SiteBanner::where('page_name', '=', 'event')->get()->toArray();
        $data = array(
            'eventss' => $eventss,
            'eventImage' => $eventImage
        );
        return view('frontend.event-detail', $data)->render();
    }

    public function shop()
    {
        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        $products = ShopProducts::orderBy('created_at', 'desc')->paginate(5);
        $data = array(
            'products' => $products,
            'shopBanner' => $shopBanner,
            
        );
        return view('frontend.shop', $data)->render();
    }
    
    public function shopDetail($slug)
    {
        $shopBanner = SiteBanner::where('page_name', '=', 'shop')->get()->toArray();
        $productss = DB::table('shop_products')->where('slug', '=', $slug)->get();
        dd($productss);
        $data = array(
            'productss' => $productss,
            'shopBanner' => $shopBanner,
            
        );
        return view('frontend.shop-detail', $data)->render();
    }
    
    public function addToCart($id) {
        $var = Cart::add(['id' => $id,
            'name' => 'Product 2',
            'qty' => 1,
            'price' => 9.99,
//            'options' => ['size' => 'large']
        ]);
        echo 'done';
//        dd($var);
    }
    
    public function getCart() {
//        $rowId = 'a775bac9cff7dec2b984e023b95206aa';
//        $var = Cart::get($rowId);
//        $var = Cart::remove($rowId);
//        $var = Cart::update($rowId, 2); // Will update the quantity
//        $var = Cart::destroy();
        $var = Cart::content();
//        $var = Cart::content()->count();
//        echo '<pre>';
//        var_dump($var);
//        echo '</pre>';
//        Cart::destroy();
        dd($var);
    }
    
    public function stripePayment() {
        return view('frontend.stripe-payment');
    }
    
    public function paycash(Request $request) {
        Stripe::setApiKey('sk_test_Nn2vVL9o3kq9aoe03stzjqr7');
        
        try {
            Charge::create ( array (
                    "amount" => 30 * 100,
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
    
    public function getPage($page_url)
    {
        $url = '/view/' . $page_url;
        $pages = Page::all();
        $page = Page::where('page_url', '=', $url)->first(); // or create a helper on your model to condense this
        return view('frontend.view', compact('page'));
    }
}
