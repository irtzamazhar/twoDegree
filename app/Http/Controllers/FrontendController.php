<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteEvent;
use App\Faq;
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

    public function blogDetail($id)
    {
    	$blog = Blog::find($id);
        return view('frontend.blog-detail')->with('blog', $blog);
    }

    public function privacy()
    {
    	return view('frontend.privacy');
    }

    public function terms()
    {
    	return view('frontend.terms');
    }

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
