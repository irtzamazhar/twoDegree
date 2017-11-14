<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Page;
use App\Menu;
use DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
//        $pages = Page::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.menu.index', ['pages' => $pages])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        $headerMenu = Menu::where('page_place', '=', 'header')->get();
        $footerMenu = Menu::where('page_place', '=', 'footer')->get();
        $data = array(
            'pages' => $pages,
            'headerMenu' => $headerMenu,
            'footerMenu' => $footerMenu,
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
        $headerTitleVar = $request->headerMenuTitle;
        $headerUrlVar = $request->headerMenuUrl;
        $footerTitleVar = $request->footerMenuTitle;
        $footerUrlVar = $request->footerMenuUrl;
                
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
        return 'Done';
//        $headerMenu = $request->headerItem;
//        $footerMenu = $request->footerItem;
//        
//        dd($request->all());
//        
//        foreach($request->headerMenu as $headerValues){
//            $headerResult[]   = $headerValues;
//        }
//        foreach($request->footerMenu as $footerValues){
//            $footerResult[] = $footerValues;
//        }
//        
//        $j = 0;
//        while($j < count($request->headerMenu)) {
//            $IdResult                 = $fieldsIdResult[$j];
//            $ValResult                = $fieldsValueResult[$j];
//            $formValue                = new Formvalue;
//            $formValue->form_field_id = $IdResult;
//            $formValue->value         = $ValResult;
//            $formValue->save();
//            $j++;
//        }
//        
////        $values = array();
//        foreach ($request->all() as $value){
//            $data = new Menu();
//            $data->page_place = $value->
//            
//            $values = array(
//                'page_place' => $headerMenu,
//                'page_url' => 'testUrl',
//                'page_value' => 1,
//            );
//        }
            
//        $data = array(
//            'page_place' => $headerMenu,
//            'page_place' => $footerMenu
//        );
//        $data = $data->ToArray();
//        DB::table('menu')->insert($values);
//        $data->save();
//        return 'Work Done';
//        return response()->json($data);
//        $headerData = $_POST['headerItem'];
//        dd($headerData);
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
