<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Location;
use App\Image;
use App\EventImage;
use Carbon\Carbon;
use DB;
use File;

class EventAdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = \DB::table('events')->orderBy('id', 'desc')->get();
        return view('admin.event.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event      = new Event();
        $location   = new Location();
        $date       = Carbon::now();
        $day        = $date->day;
        $month      = $date->month;
        $year       = $date->year;

        $dmy        = $year.'-'.$month.'-'.$day;

        return view('admin.event.create', compact('event', 'dmy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:50',
            'content'=>'required|max:10000',
            'start_date'=>'date|before:tomorrow',
            'end_date'=>'date|after:start_date',
            'start_time'=>'date_format:h:i|before:end_time',
            'end_time'=>'date_format:h:i|after:start_time',
            'number'=>'max:12',
            'street'=>'max:40',
            'suburb'=>'max:40',
            'area'=>'max:40',
            'country'=>'max:30',
            'image[]'=>'image',
        ]);


        $location = new Location();
        $event = new Event();

        $event->title       = $request->title;
        $event->content     = $request->content;
        $event->start_date  = str_replace('-','/',$request->start_date);
        $event->end_date    = str_replace('-','/',$request->end_date);
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;
        $event->type        = $request->type;
        $event->status      = $request->status;


        $event->save();

        $location->number       = $request->number;
        $location->street       = $request->street;
        $location->suburb       = $request->suburb;
        $location->area         = $request->area;
        $location->country      = $request->country;
        $location->location_map = $request->number.'+'.$request->street.',+'.$request->suburb.',+'.$request->area.',+'.$request->country;
        $location->location_map = str_replace(' ','+',$location->location_map);
        $location->event_id     = $event->id;

        $location->save(); 

        $original = 'img/site/original/'; 
        $sliderPath = 'img/site/slider/';
        $galleryThumbPath = 'img/site/gallery/thumbnail/';
        $galleryPrevPath = 'img/site/gallery/preview/';
        $thumbnail = 'img/site/thumbnail/';
        
        if ( $request->hasFile('image') ) {

            $counter=0;

            foreach ( $request->file('image') as $image) {
                
                $fileName = uniqid().'.'.$request->file('image')[$counter]->getClientOriginalName();
                
                $imageSource = \Image::make($request->file('image')[$counter]);

                $imageSource->save($original.$fileName);

                \Image::make($request->file('image')[$counter])->resize(1000, null, function ($constraint) {$constraint->aspectRatio();})
                        ->save($galleryPrevPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->resize(1000, null, function ($constraint) {$constraint->aspectRatio();})
                        ->crop(1000, 400, 0, 0)
                        ->save($sliderPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->fit(100, 100)
                        ->save($galleryThumbPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->fit(250, 150)
                        ->save($thumbnail.$fileName, 80);

                $imagedb = new Image();
                $eventImage = new EventImage();
                $imagedb->image = $fileName;
                
                $imagedb->save();

                $eventImage->image_id = $imagedb->id;
                $eventImage->event_id = $event->id;
                $eventImage->save();

                $counter++;
            
            }
        }

        if ( count($request->currentImage) > 0 ) {
            foreach ( $request->currentImage as $checked ) {
                $imagedb = Image::where('id', $checked)->first();
                \File::delete([$sliderPath.$imagedb->image , $galleryPrevPath.$imagedb->image , $galleryThumbPath.$imagedb->image, $thumbnail.$imagedb->image, $original.$imagedb->image ]);
                EventImage::where('event_id', $event->id)->where('image_id', $checked)->delete();
                $imagedb->delete();
            }
        }

        if ( isset($request->preview) ) {
            return redirect('/event/'.$event->id);
        } else {
            \Session::flash('created', 'The '.$event->title.' event has been created.');
            return redirect('/admin/event/'.$event->id.'/edit');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('id', $id)->first();
        $location = Location::where('event_id', $id)->firstOrFail();

        return view('admin.event.edit', compact('event','location'));
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

        $this->validate($request, [
            'title'=>'required|max:50',
            'content'=>'required|max:10000',
            'start_date'=>'date|before:end_date',
            'end_date'=>'date|after:start_date',
            'start_time'=>'date_format:H:i|before:end_time',
            'end_time'=>'date_format:H:i|after:start_time',
            'number'=>'max:12',
            'street'=>'max:40',
            'suburb'=>'max:40',
            'area'=>'max:40',
            'country'=>'max:30',
            'image[]'=>'image',
        ]);

        $event = Event::findOrFail($id);
        $location = Location::where('event_id', $id)->firstOrFail();

        if ( $request->status == 0 || $request->status == 1 ) {
            $event->status = $request->status;
        } elseif ( $request->status == 2 ) {
            $event->delete();
            return redirect('/admin/event/');
        }

        $event->title       = $request->title;
        $event->content     = $request->content;
        $event->start_date  = str_replace('-','/',$request->start_date);
        $event->end_date    = str_replace('-','/',$request->end_date);
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;

        $event->save();

        $location->number       = $request->number;
        $location->street       = $request->street;
        $location->suburb       = $request->suburb;
        $location->area         = $request->area;
        $location->country      = $request->country;
        $location->location_map = $request->number.'+'.$request->street.',+'.$request->suburb.',+'.$request->area.',+'.$request->country;
        $location->location_map = str_replace(' ','+',$location->location_map);
        
        $location->save();

        $original = 'img/site/original/'; 
        $sliderPath = 'img/site/slider/';
        $galleryThumbPath = 'img/site/gallery/thumbnail/';
        $galleryPrevPath = 'img/site/gallery/preview/';
        $thumbnail = 'img/site/thumbnail/';
        
        if ( $request->hasFile('image') ) {

            $counter=0;

            foreach ( $request->file('image') as $image) {
                $fileName = uniqid().'.'.$request->file('image')[$counter]->getClientOriginalName();
                
                $imageSource = \Image::make($request->file('image')[$counter]);

                $imageSource->save($original.$fileName);

                \Image::make($request->file('image')[$counter])->resize(1000, null, function ($constraint) {$constraint->aspectRatio();})
                        ->save($galleryPrevPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->resize(1000, null, function ($constraint) {$constraint->aspectRatio();})
                        ->crop(1000, 400, 0, 0)
                        ->save($sliderPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->fit(100, 100)
                        ->save($galleryThumbPath.$fileName, 80);

                \Image::make($request->file('image')[$counter])->fit(250, 150)
                        ->save($thumbnail.$fileName, 80);

                $imagedb = new Image();
                $eventImage = new EventImage();
                $imagedb->image = $fileName;

                $imagedb->save();

                $eventImage->image_id = $imagedb->id;
                $eventImage->event_id = $id;
                $eventImage->save();

                $counter++;
            }
        }

        if ( count($request->currentImage) > 0 ) {
            foreach ( $request->currentImage as $checked ) {
                $imagedb = Image::where('id', $checked)->first();
                \File::delete([$sliderPath.$imagedb->image , $galleryPrevPath.$imagedb->image , $galleryThumbPath.$imagedb->image, $thumbnail.$imagedb->image, $original.$imagedb->image ]);
                EventImage::where('event_id', $id)->where('image_id', $checked)->delete();
                $imagedb->delete();
            }
        }  

        if ( isset($request->preview) ) {

            return redirect('/event/'.$id);
        } else {
            return redirect('/admin/event/'.$id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $original = 'img/site/original/'; 
        $sliderPath = 'img/site/slider/';
        $galleryThumbPath = 'img/site/gallery/thumbnail/';
        $galleryPrevPath = 'img/site/gallery/preview/';
        $thumbnail = 'img/site/thumbnail/';

            foreach ( $event->images as $image ) {
                $imagedb = Image::where('id', $image->id)->first();
                \File::delete([$sliderPath.$imagedb->image , $galleryPrevPath.$imagedb->image , $galleryThumbPath.$imagedb->image, $thumbnail.$imagedb->image, $original.$imagedb->image ]);
                EventImage::where('event_id', $event->id)->where('image_id', $image->id)->delete();
                $imagedb->delete();
            }

        \Session::flash('delete', $event->title.' has been deleted.');

        $event->delete();

        return redirect('/admin/event/');

    }
}
