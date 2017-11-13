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

    public function blogDetail($slug)
    {
        $pages = Page::all();
        $blogss = DB::table('blogs')->where('slug', $slug)->get();
        $data = array(
            'blogss' => $blogss,
            'pages' => $pages
        );
        return view('frontend.blog-detail', $data)->render();
    }
    
    public function getPage($page_url)
    {
        $url = '/view/' . $page_url;
        $pages = Page::all();
        $page = Page::where('page_url', '=', $url)->first(); // or create a helper on your model to condense this
        return view('frontend.view', compact('page' , 'pages'));
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
        $pages = Page::all();
        dd($pages);
    	return view('frontend.contact')->with('pages', $pages);
    }
    
    public function events()
    {
        $pages = Page::all();
        $events = SiteEvent::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.events', ['events' => $events], ['pages' => $pages])->render();
    }
    
    public function eventDetail($slug)
    {
        $pages = Page::all();
        $eventss = DB::table('site_events')->where('slug', $slug)->get();
        $data = array(
            'eventss' => $eventss,
            'pages' => $pages
        );
        return view('frontend.event-detail', $data)->render();
//        return view('frontend.event-detail')->with('event', $event);
    }
}
