<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\Contact;
use App\SiteEvent;
use App\Newsletter;
use App\Section;
use Carbon\Carbon;
//use Charts;
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
//        $chart = Charts::multi('line', 'highcharts')
//            ->title("Contact Inquiries/Subscriber's")
//            ->dimensions(0, 400) // Width x Height
//            ->template("material")
//            ->values([100, 90, 80])
//            ->labels(["Jan", "Feb", "Mar"]);
//        $chart = Charts::new('line', 'highcharts')
//                ->setTitle("Contact Inquiries/Subscriber's")
//                ->setLabels(["Jan", "Feb", "Mar"])
//                ->setValues([100, 90, 80])
//                ->setElementLabel("All Subscriber's");
        $data = array(
            'countBlog' => $countBlog,
            'countContact' => $countContact,
            'countSiteEvent' => $countSiteEvent,
            'countNewsletter' => $countNewsletter,
//            'chart' => $chart,
            );
        
        return view('admin.admin.home', $data)->render();
    }
    
    
}
