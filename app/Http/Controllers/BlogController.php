<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteBanner;
use File;
use DB;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.blog.index', ['blogs' => $blogs])->render();        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.blog.create');
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
            'title' => 'required',
            'blog-post' => 'required'
        ], [
            'title.required' => 'Title Field is Required.',
            'blog-post.required' => 'Post Body Field is Required.'
        ]);
        
        // Create Blog Post
        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->editor = $request->input('blog-post');
        $slug = SlugService::createSlug(Blog::class, 'slug', $blog->title);
        $blog->save();
        
        $request->session()->flash('success', 'Post successful added!');
        
        return redirect('/admin/blog/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.admin.blog.showPost')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.admin.blog.editPost')->with('blog', $blog);
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
        $this->validate($request, [
            'title' => 'required',
            'blog-post' => 'required'
        ]);
        
        // Create Post
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->editor = $request->input('blog-post');
        $blog->slug = null;
        $blog->save();
        
        $request->session()->flash('success', 'Post Updated!');
        
        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        $blog->delete();
        return redirect('/admin/blog')->with('danger', 'Post Removed!');
    }
    
    public function addBanner() {
        $siteBanner = SiteBanner::where('page_name', '=', 'blog')->get()->toArray();
        return view('admin.admin.blog.addBanner', ['siteBanner' => $siteBanner])->render();
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
        $blogBanner = SiteBanner::find($id);
        File::delete("storage/app/public/images/$blogBanner->banner_image");
        if($request->hasFile('banner-image')){
            $blogBanner->banner_image = $fileNameToStore;            
        }
        $blogBanner->page_name = $request->input('page-name');
        $blogBanner->save();
        
        $request->session()->flash('success', 'Banner added successfully!');
        return redirect('/admin/blog/addBanner');
    }
    
    public function set_active($route) {
        if(is_array($route)){
            return in_array(Request::path(), $route) ? 'active' : '';
        }
        return Request::path() == $route ? 'active' : '';
    }
}
