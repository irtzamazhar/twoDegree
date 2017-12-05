<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Contact;
use App\SiteBanner;
use File;
use DB;

class ContactController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $this->middleware('auth');
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.contact.index', ['contacts' => $contacts])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $contact = new Contact;
        $contact->fname = $request->input('fname');
        $contact->lname = $request->input('lname');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        
        return redirect('/contact');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.admin.contact.showContact')->with('contact', $contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();
        return redirect('/admin/contact')->with('danger', 'Contact Removed!');
    }
    
    public function addBanner() {
        $siteBanner = SiteBanner::where('page_name', '=', 'contact')->get()->toArray();
        return view('admin.admin.contact.addBanner', ['siteBanner' => $siteBanner])->render();
    }
    
    public function storeBanner(Request $request, $id)
    {        
        // Validate the banner image
        $this->validate($request, [
            'banner-image' => 'required|image|nullable|max:1999'
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
        $contactBanner = SiteBanner::find($id);
        File::delete("storage/app/public/images/$contactBanner->banner_image");
        $contactBanner->page_name = $request->input('page-name');
        if($request->hasFile('banner-image')){
            $contactBanner->banner_image = $fileNameToStore;            
        }
        
        $contactBanner->save();
        
        $request->session()->flash('success', 'Banner added successfully!');
        return redirect('/admin/contact/addBanner');
    }
}
