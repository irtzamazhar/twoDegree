<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteEvent;
use App\Faq;
use App\Page;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $pages = Page::all();
    	return view('frontend.index')->with('pages', $pages);
    }

    public function app()
    {
        $pages = Page::all();
    	return view('frontend.app-download')->with('pages', $pages);
    }

    public function blog()
    {
        $pages = Page::all();
    	$blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blog', ['blogs' => $blogs], ['pages' => $pages])->render();
    }

    public function blogDetail($id)
    {
        $pages = Page::all();
    	$blog = Blog::find($id);
        return view('frontend.blog-detail', ['blog' => $blog], ['pages' => $pages])->render();
    }
    
    public function getPage($page_url)
    {
        $url = '/' . $page_url;
        $pages = Page::all();
//        $pages = Page::where('page_status', 1);
//        var_dump($pages);
//        die('vjnfs');
        $page = Page::where('page_url', '=', $url)->first(); // or create a helper on your model to condense this
        return view('frontend.app-download', compact('page' , 'pages'));
    }

//    public function privacy()
//    {
//    	return view('frontend.privacy');
//    }

//    public function terms()
//    {
//    	return view('frontend.terms');
//    }

    public function faq()
    {
        $faqs = DB::table('faqs')->where('faq_status', 1)->orderBy('created_at', 'asc')->get();
        return view('frontend.faq', ['faqs' => $faqs])->render();
    }

    public function contact()
    {
    	return view('frontend.contact');
    }
    
    public function events()
    {
        $events = SiteEvent::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.events', ['events' => $events])->render();
    }
    
    public function eventDetail($id)
    {
        $event = SiteEvent::find($id);
        return view('frontend.event-detail')->with('event', $event);
    }
}
