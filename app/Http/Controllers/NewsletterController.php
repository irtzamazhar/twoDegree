<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Newsletter;
use DB;
use Auth;
use Config;

class NewsletterController extends Controller
{
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
    
    public function index(Request $request) {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.newsletter', ['newsletters' => $newsletters])->render();
    }
    
    public function subscribe(Request $request)
    {
    	$this->validate($request, [
	    	'email' => 'required|email',
        ]);    
        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->save();
    }
}
