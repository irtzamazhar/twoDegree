<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\HomePage;
use DB;

class HomePageController extends Controller
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
        $sections = HomePage::all();
        return view('admin.admin.home.index', ['sections' => $sections])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.home.create');
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
            'section-name' => 'required',
            'section-image' => 'required|image|nullable|max:1999'
        ],[
            'section-name.required' => 'Section Name is Required',
            'section=image.required' => 'Image is Required',
            'section=image.image' => 'Must be an Image.',
        ]);
        
        // Handle file upload
        if ($request->hasFile('section-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('section-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('section-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('section-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Create Section
        $section = new HomePage;
        $section->section_name = $request->input('section-name');
        $section->section_content = $request->input('section-content');
        $section->section_image = $fileNameToStore;
        $section->save();
        
        $request->session()->flash('success', 'Section Created!');
        
        return redirect('/admin/home/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = HomePage::find($id);
        return view('admin.admin.home.show')->with('section', $section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = HomePage::find($id);
        return view('admin.admin.home.edit')->with('section', $section);
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
            'section-name' => 'required',
            'section-image' => 'image|nullable|max:1999'
        ],[
            'section-name.required' => 'Section Name is Required',
            'section-image.image' => 'Must be an Image.',
        ]);
        
        // Handle file upload
        if ($request->hasFile('section-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('section-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('section-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('section-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Create Event
        $section = HomePage::find($id);
        $section->section_name = $request->input('section-name');
        $section->section_content = $request->input('section-content');
        if($request->hasFile('section-image')){
            $section->section_image = $fileNameToStore;
        }
        $section->save();
        
        $request->session()->flash('success', 'Section Updated!');
        
        return redirect('/admin/home/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = HomePage::find($id);
        $section->delete();
        return redirect('/admin/home')->with('danger', 'Section Removed!');
    }
}
