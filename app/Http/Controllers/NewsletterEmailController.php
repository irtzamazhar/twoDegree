<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\NewsletterEmail;
use DB;

class NewsletterEmailController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $newsletterEmails = NewsletterEmail::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.subscriber', ['newsletterEmails' => $newsletterEmails])->render();
    }
    
    public function subscribe(Request $request)
    {
    	$var = $this->validate($request, [
	    'email' => 'required|email',
        ]);
        
        $newsletter = new NewsletterEmail;
        $newsletter->email = $request->input('email');
        $check = Newsletter::isSubscribed($newsletter->email);
        if($check == 1){
            echo 'exist';
        } else {
            $newsletter->save();
            Newsletter::subscribe($newsletter->email);
        }
    }
}
