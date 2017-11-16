<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Faq;
use App\SiteBanner;
use File;
use DB;

class FaqsController extends Controller
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
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.faq.index', ['faqs' => $faqs])->render();
//        return view('admin.admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the faq
        $this->validate($request, [
            'faqTitle' => 'required',
            'faq-content' => 'required',
            'faq-status' => 'required'
        ],[
            'faqTitle.required' => 'Title is Required',
            'faq-content.required' => 'Content is Required',
            'faq-status.required' => 'Must select one option'
        ]);
        
        // Create Blog Post
        $faq = new Faq;
        $faq->faq_title = $request->input('faqTitle');
        $faq->faq_content = $request->input('faq-content');
        $faq->faq_status = $request->input('faq-status');
        $faq->save();
        
        $request->session()->flash('success', 'Question is added!');
        
        return redirect('/admin/faq/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        return view('admin.admin.faq.showFaq')->with('faq', $faq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.admin.faq.editFaq')->with('faq', $faq);
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
        // Validate the faq
        $this->validate($request, [
            'faqTitle' => 'required',
            'faq-content' => 'required',
            'faq-status' => 'required'
        ]);
        
        // Create Post
        $faq = Faq::find($id);
        $faq->faq_title = $request->input('faqTitle');
        $faq->faq_content = $request->input('faq-content');
        $faq->faq_status = $request->input('faq-status');
        $faq->save();
        
        $request->session()->flash('success', 'Question is Updated!');
        
        return redirect('/admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        $faq->delete();
        return redirect('/admin/faq')->with('danger', 'Question is Removed!');
    }
    
    public function addBanner() {
        $siteBanner = SiteBanner::where('page_name', '=', 'faq')->get()->toArray();
        return view('admin.admin.faq.addBanner', ['siteBanner' => $siteBanner])->render();
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
        
        // Create Blog Post
        $faqBanner = SiteBanner::find($id);
        File::delete("storage/app/public/images/$faqBanner->banner_image");
        if($request->hasFile('banner-image')){
            $faqBanner->banner_image = $fileNameToStore;            
        }
        $faqBanner->page_name = $request->input('page-name');
        $faqBanner->save();
        
        $request->session()->flash('success', 'Banner added successfully!');
        return redirect('/admin/faq/addBanner');
    }
}
