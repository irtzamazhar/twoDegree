<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteEvent;
use App\Faq;
use App\Page;
use App\Menu;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }

    public function app()
    {
    	return view('frontend.app-download');
    }

    public function blog()
    {
    	$blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blog', ['blogs' => $blogs])->render();
    }

    public function blogDetail($slug)
    {
        $blogss = DB::table('blogs')->where('slug', $slug)->get();
        $data = array(
            'blogss' => $blogss,
        );
        return view('frontend.blog-detail', $data)->render();
    }
    
    public function getPage($page_url)
    {
        $url = '/view/' . $page_url;
        $pages = Page::all();
        $page = Page::where('page_url', '=', $url)->first(); // or create a helper on your model to condense this
        return view('frontend.view', compact('page'));
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
    
    public function eventDetail($slug)
    {
        $eventss = DB::table('site_events')->where('slug', $slug)->get();
        $data = array(
            'eventss' => $eventss,
        );
        return view('frontend.event-detail', $data)->render();
    }
}
