<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ShopProducts;
use App\SiteBanner;
use File;
use DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
}
