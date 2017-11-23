<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Page;
use App\Section;
use App\Menu;
use DB;

class MenuController extends Controller
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
        $pages = Page::all();
        $sections = Section::all();
//        $pages = Page::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.menu.index', ['pages' => $pages], ['sections' => $sections])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        $sections = Section::all();
        $headerMenu = Menu::where('page_place', '=', 'header')->get();
        $footerMenu = Menu::where('page_place', '=', 'footer')->get();
        $data = array(
            'pages' => $pages,
            'headerMenu' => $headerMenu,
            'footerMenu' => $footerMenu,
            'sections' => $sections,
        );
        return view('admin.admin.menu.index', $data)->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $headerTitleVar = $request->hName;
        $headerUrlVar = $request->hURL;
        $footerTitleVar = $request->fName;
        $footerUrlVar = $request->fURL;
        
//        var_dump($headerTitleVar);
//        echo '<br>';
//        var_dump($headerUrlVar);
//        echo '<br>';
//        var_dump($footerTitleVar);
//        echo '<br>';
//        var_dump($footerUrlVar);
//        echo '<br>';
//        die();
//        $page = Page::find($id);
//        $page->delete();
        
        Menu::truncate();
                
        for($i=0; $i<count($headerTitleVar); $i++){
            $headerData = new Menu;
            $headerData->page_place = 'header';
            $headerData->page_name = $headerTitleVar[$i];
            $headerData->page_url = $headerUrlVar[$i];
            $headerData->page_value = 1;
            $headerData->save();
        }
        
        for($i=0; $i<count($footerTitleVar); $i++){
            $footerData = new Menu;
            $footerData->page_place = 'footer';
            $footerData->page_name = $footerTitleVar[$i];
            $footerData->page_url = $footerUrlVar[$i];
            $footerData->page_value = 0;
            $footerData->save();
        }
        
        $request->session()->flash('success', 'Menu Updated!');
        return redirect('/admin/menu/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.admin.menu.showMenu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.admin.menu.editMenu');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
