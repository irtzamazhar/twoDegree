<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\SiteEvent;
use App\Faq;
use App\Page;
use App\Menu;
use App\SiteBanner;
use App\HomePage;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $topSection = HomePage::where('section_name', '=' , 'Top Section')->get()->toArray();
        $middleSection = HomePage::where('section_name', '=' , 'Middle Section')->get()->toArray();
        $bottomSection = HomePage::where('section_name', '=' , 'Bottom Section')->get()->toArray();
        $data = array(
            'topSection' => $topSection,
            'middleSection' => $middleSection,
            'bottomSection' => $bottomSection,
        );
    	return view('frontend.index', $data)->render();
    }

    public function app()
    {
    	return view('frontend.app-download');
    }

    public function blog()
    {
        $siteBanner = SiteBanner::where('page_name', '=', 'blog')->get()->toArray();
    	$blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.blog', ['blogs' => $blogs], ['siteBanner' => $siteBanner])->render();
    }

    public function blogDetail($slug)
    {
        $siteBanner = SiteBanner::where('page_name', '=', 'blog')->get()->toArray();
        $blogss = DB::table('blogs')->where('slug', $slug)->get();
        $data = array(
            'blogss' => $blogss,
            'siteBanner' => $siteBanner
        );
        return view('frontend.blog-detail', $data)->render();
    }

    public function faq()
    {
        $faqImage = SiteBanner::where('page_name', '=', 'faq')->get()->toArray();
        $faqs = DB::table('faqs')->where('faq_status', 1)->orderBy('created_at', 'asc')->get();
        $data = array(
            'faqs' => $faqs,
            'faqImage' => $faqImage
        );
        
        return view('frontend.faq', $data)->render();
    }

    public function contact()
    {
        $contactImage = SiteBanner::where('page_name', '=', 'contact')->get()->toArray();
        $data = array(
            'contactImage' => $contactImage
        );
        return view('frontend.contact', $data)->render();
    }
    
    public function events()
    {
        $eventImage = SiteBanner::where('page_name', '=', 'event')->get()->toArray();
        $events = SiteEvent::orderBy('created_at', 'desc')->paginate(5);
        $data = array(
            'events' => $events,
            'eventImage' => $eventImage
        );
        
        return view('frontend.events', $data)->render();
    }
    
    public function eventDetail($slug)
    {
        $eventss = DB::table('site_events')->where('slug', $slug)->get();
        $eventImage = SiteBanner::where('page_name', '=', 'event')->get()->toArray();
        $data = array(
            'eventss' => $eventss,
            'eventImage' => $eventImage
        );
        return view('frontend.event-detail', $data)->render();
    }
    
    public function getPage($page_url)
    {
        $url = '/view/' . $page_url;
        $pages = Page::all();
        $page = Page::where('page_url', '=', $url)->first(); // or create a helper on your model to condense this
        return view('frontend.view', compact('page'));
    }
}
