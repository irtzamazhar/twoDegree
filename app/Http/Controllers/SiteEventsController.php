<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\SiteEvent;
use App\SiteBanner;
use File;
use DB;

class SiteEventsController extends Controller
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
        $site_events = SiteEvent::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admin.event.index', ['site_events' => $site_events])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the event
        $this->validate($request, [
            'event-title' => 'required',
            'event-day' => 'required',
            'event-timing1' => 'required',
            'event-timing2' => 'required',
            'event-detail' => 'required',
            'event-image' => 'required|image|max:1999',
            'event-location' => 'required'
        ],[
            'event-title.required' => 'Event Title is required',
            'event-day.required' => 'Event Day is required',
            'event-timing1.required' => 'Event Timing is required',
            'event-detail.required' => 'Event Detail is required',
            'event-image.required' => 'Event Image is required',
            'event-image.image' => 'Must Be An Image',
            'event-location.required' => 'Event Location is required',
        ]);
        
        // Handle file upload
        if ($request->hasFile('event-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('event-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('event-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('event-image')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Create Event
        $event = new SiteEvent;
        $event->event_title = $request->input('event-title');
        $event->event_day = $request->input('event-day');
        $event->event_timing1 = $request->input('event-timing1');
        $event->event_timing2 = $request->input('event-timing2');
        $event->event_detail = $request->input('event-detail');
        $event->event_image = $fileNameToStore;
        $event->place_lat = $request->input('place-lat');
        $event->place_lng = $request->input('place-lng');
        $event->address = $request->input('address');
        $slug = SlugService::createSlug(SiteEvent::class, 'slug', $event->event_title);
        $newEvent = $event->replicate();
        $event->save();
        
        $request->session()->flash('success', 'Event added!');
        
        return redirect('/admin/event/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = SiteEvent::find($id);
        return view('admin.admin.event.showEvent')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = SiteEvent::find($id);
        return view('admin.admin.event.editEvent')->with('event', $event);
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
        // Validate the event
        $this->validate($request, [
            'event-title' => 'required',
            'event-day' => 'required',
            'event-timing1' => 'required',
            'event-timing2' => 'required',
            'event-detail' => 'required',
//            'event-image' => 'image|nullable|max:1999',
            'event-location' => 'required'
        ]);
        
        // Create Event
        $event = SiteEvent::find($id);
        $event->event_title = $request->input('event-title');
        $event->event_day = $request->input('event-day');
        $event->event_timing1 = $request->input('event-timing1');
        $event->event_timing2 = $request->input('event-timing2');
        $event->event_detail = $request->input('event-detail');
//        $event->event_image = $fileNameToStore;
        $event->place_lat = $request->input('place-lat');
        $event->place_lng = $request->input('place-lng');
        $event->address = $request->input('address');
        $event->slug = null;
        $event->save();
        
        $request->session()->flash('success', 'Event Updated!');
        
        return redirect('/admin/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site_event = SiteEvent::find($id);

        $site_event->delete();
        return redirect('/admin/event')->with('danger', 'Event Removed!');
    }
    
    public function addBanner() {
        $siteBanner = SiteBanner::where('page_name', '=', 'event')->get()->toArray();
        return view('admin.admin.event.addBanner', ['siteBanner' => $siteBanner])->render();
    }
    
    public function storeBanner(Request $request, $id)
    {        
        // Validate the banner image
        $this->validate($request, [
            'banner-image' => 'required|image|nullable|max:1999',
        ], [
            'banner-image.required' => 'Image is Required',
            'banner-image.image' => 'Must be an Image.',
        ]);
        
        // Handle file upload
        if ($request->hasFile('banner-image')) {
            // Get file with the extention
            $fileNameWithExt = $request->file('banner-image')->getClientOriginalName();
            // Get just name of image
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get extention of image
            $extension = $request->file('banner-image')->getClientOriginalExtension();
            // Filename to store the image
            $fileNameToStore = $fileName.'-'.time().'.'.$extension;
            // Upload image
            $path = $request->file('banner-image')->storeAs('public/images', $fileNameToStore);
        }
        
        // Create Blog Post
        $eventBanner = SiteBanner::find($id);
        File::delete("storage/app/public/images/$eventBanner->banner_image");
        if($request->hasFile('banner-image')){
            $eventBanner->banner_image = $fileNameToStore;            
        }
        $eventBanner->page_name = $request->input('page-name');
        $eventBanner->save();
        
        $request->session()->flash('success', 'Banner added successfully!');
        return redirect('/admin/event/addBanner');
    }
}
