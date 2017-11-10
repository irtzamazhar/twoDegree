<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use DB;

class BlogController extends Controller
{
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
        
        // Redirect to next page
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
    
    public function set_active($route) {
        if(is_array($route)){
            return in_array(Request::path(), $route) ? 'active' : '';
        }
        return Request::path() == $route ? 'active' : '';
    }
}
