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
use Charts;
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
        $newsletterData =  DB::table('newsletters')->get(); //must alias the aggregate column as aggregate
        // Monthly chart
        $monthChart = Charts::multiDatabase('line', 'highcharts')
            ->title("Contact Inquiries/Subscriber's")
            ->dimensions(0, 400) // Width x Height
            ->colors(['#F39C12', '#00C0EF'])
            ->dataset("Subscriber's", Newsletter::all())
            ->dataset('Contact Inquiries', Contact::all())
            ->responsive(false)
            ->elementLabel('')
            ->groupByMonth(2017, true);
        
        // Yearly chart
        $yearChart = Charts::multiDatabase('line', 'highcharts')
            ->title("Contact Inquiries/Subscriber's")
            ->dimensions(1089, 400) // Width x Height
            ->colors(['#F39C12', '#00C0EF'])
            ->dataset("Subscriber's", Newsletter::all())
            ->dataset('Contact Inquiries', Contact::all())
            ->responsive(false)
            ->elementLabel('')
            ->groupByYear();
        
        // Daily chart
        $dayChart = Charts::multiDatabase('line', 'highcharts')
            ->title("Contact Inquiries/Subscriber's")
            ->dimensions(1089, 400) // Width x Height
            ->colors(['#F39C12', '#00C0EF'])
            ->dataset("Subscriber's", Newsletter::all())
            ->dataset('Contact Inquiries', Contact::all())
            ->responsive(false)
            ->elementLabel('')
            ->dateFormat('d M')
            ->lastByDay(30, true);
        
        $data = array(
            'countBlog' => $countBlog,
            'countContact' => $countContact,
            'countSiteEvent' => $countSiteEvent,
            'countNewsletter' => $countNewsletter,
            'monthChart' => $monthChart,
            'yearChart' => $yearChart,
            'dayChart' => $dayChart,
            );
        
        return view('admin.admin.home', $data)->render();
    }
}
