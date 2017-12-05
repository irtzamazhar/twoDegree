<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Subscriber;
use DB;
//use Auth;
//use Config;

class NewsletterController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function spatieMail() {
        Newsletter::subscribe('rincewind@discworld.com');
    }
    
//    protected $mailchimp;
//    protected $listId = '537f1a7d8b';
//    public $apiKey = '6d1e9b2229282d24aeb0c51a82bfca29-us17';

    /**
     * Pull the Mailchimp-instance from the IoC-container.
     */
//    public function __construct(\Mailchimp $mailchimp)
//    {
//        $this->mailchimp = $mailchimp;
//    }
    
    public function index() {
        $newsletters = App\Subscriber::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.subs', ['newsletters' => $newsletters])->render();
    }
    
//    public function subscribe(Request $request)
//    {
//    	$this->validate($request, [
//	    	'email' => 'required|email',
//        ]);
//        
//        try {
//            $this->mailchimp
//            ->lists
//            ->subscribe(
//                $this->listId,
//                ['email' => $request->input('email')]
//            );
//
//            return redirect()->back()->with('success','Email Subscribed successfully');
//
//        } catch (\Mailchimp_List_AlreadySubscribed $e) {
//            return redirect()->back()->with('error','Email is Already Subscribed');
//        } catch (\Mailchimp_Error $e) {
//            return redirect()->back()->with('error','Error from MailChimp');
//        }
//    }
    
    public function subscribe(Request $request)
    {
    	$this->validate($request, [
	    	'email' => 'required|email',
        ]);    
        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->save();
    }
    
    public function checkEmail(Request $request) {
        $var = $request->input('email');
        $check = DB::table('newsletters')->where('email', '=', $var)->get();
        if(count($check)>0){
            echo 'Email is Already Subscribed';
        }else{
            echo 'Thanks';
        }
    }
}
