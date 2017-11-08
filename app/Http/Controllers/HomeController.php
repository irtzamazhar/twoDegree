<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\Contact;
use App\SiteEvent;
use App\Newsletter;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $countSiteEvent = DB::table('site_events')->where('event_day', '>=', $today)->count();
        
        $countBlog = Blog::all()->count();
        $countContact = Contact::all()->count();
        $countNewsletter = Newsletter::all()->count();
        $data = array(
            'countBlog' => $countBlog,
            'countContact' => $countContact,
            'countSiteEvent' => $countSiteEvent,
            'countNewsletter' => $countNewsletter,
            );
        
        return view('admin.admin.home', $data)->render();
    }

    public function widgets()
    {
        return view('admin.admin.widgets');
    }
    
    public function contact()
    {
        return view('admin.admin.contact');
    }

    public function newsletter()
    {
        return view('admin.admin.newsletter');
    }

    public function table()
    {
        return view('admin.admin.table');
    }
}
