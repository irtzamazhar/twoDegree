<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Page;
use DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.pages.index', ['pages' => $pages])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the post
        $this->validate($request, [
            'page_url' => 'required',
            'page_title' => 'required',
            'page_status' => 'required',
            'page_content' => 'required',
            'page-image' => 'required|image|nullable|max:1999'
        ],[
            'page_url.required' => 'Page URL is Required',
            'page_title.required' => 'Page Title is Required',
            'page_status.required' => 'Page Status is Required',
            'page_content.required' => 'Page Content is Required',
            'page-image.required' => 'Image is Required',
            'page-image.image' => 'Must be an Image.',
        ]);
        // Handle file upload
        if ($request->hasFile('page-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('page-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('page-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('page-image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Create Event
        $page = new Page;
        $page->page_url = $request->input('page_url');
        $page->page_title = $request->input('page_title');
        $page->page_status = $request->input('page_status');
        $page->page_content = $request->input('page_content');
        $page->page_image = $fileNameToStore;
        $page->save();
        
        $request->session()->flash('success', 'Page Created!');
        
        return redirect('/admin/pages/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('admin.admin.pages.showPage')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.admin.pages.editPage')->with('page', $page);
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
        // Validate the post
        $this->validate($request, [
            'page_url' => 'required',
            'page_title' => 'required',
            'page_status' => 'required',
            'page_content' => 'required',
            'page-image' => 'required|image|nullable|max:1999'
        ],[
            'page_url.required' => 'Page URL is Required',
            'page_title.required' => 'Page Title is Required',
            'page_status.required' => 'Page Status is Required',
            'page_content.required' => 'Page Content is Required',
            'page-image.required' => 'Image is Required',
            'page-image.image' => 'Must be an Image.',
        ]);
        
        // Handle file upload
        if ($request->hasFile('page-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('page-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('page-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('page-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Create Event
        $page = Page::find($id);
        $page->page_url = $request->input('page_url');
        $page->page_title = $request->input('page_title');
        $page->page_status = $request->input('page_status');
        $page->page_content = $request->input('page_content');
        if($request->hasFile('page-image')){
            $page->page_image = $fileNameToStore;            
        }
        $page->save();
        
        $request->session()->flash('success', 'Page Updated!');
        
        return redirect('/admin/pages/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        $page->delete();
        return redirect('/admin/pages')->with('danger', 'Page Removed!');
    }
}
