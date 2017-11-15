<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Faq;
use DB;

class FaqsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.faq.index', ['faqs' => $faqs])->render();
//        return view('admin.admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the faq
        $this->validate($request, [
            'faqTitle' => 'required',
            'faq-content' => 'required',
            'faq-status' => 'required'
        ],[
            'faqTitle.required' => 'Title is Required',
            'faq-content.required' => 'Content is Required',
            'faq-status.required' => 'Must select one option'
        ]);
        
        // Create Blog Post
        $faq = new Faq;
        $faq->faq_title = $request->input('faqTitle');
        $faq->faq_content = $request->input('faq-content');
        $faq->faq_status = $request->input('faq-status');
        $faq->save();
        
        $request->session()->flash('success', 'Question is added!');
        
        return redirect('/admin/faq/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        return view('admin.admin.faq.showFaq')->with('faq', $faq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.admin.faq.editFaq')->with('faq', $faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the faq
        $this->validate($request, [
            'faqTitle' => 'required',
            'faq-content' => 'required',
            'faq-status' => 'required'
        ]);
        
        // Create Post
        $faq = Faq::find($id);
        $faq->faq_title = $request->input('faqTitle');
        $faq->faq_content = $request->input('faq-content');
        $faq->faq_status = $request->input('faq-status');
        $faq->save();
        
        $request->session()->flash('success', 'Question is Updated!');
        
        return redirect('/admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        $faq->delete();
        return redirect('/admin/faq')->with('danger', 'Question is Removed!');
    }
}
