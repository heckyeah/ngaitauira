<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Location;
use App\Image;
use App\Video;
use App\Staff;
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
    public function index($type)
    {

        if ($type == 'staff') {
            $events = Staff::all();
            return view('admin.'.$type.'.index')->with('events', $events);
        } elseif ($type == 'video') {
            $events = Video::all();
            return view('admin.'.$type.'.index')->with('events', $events);
        } elseif ($type == 'event' || $type == 'page') {
            $events = Event::where('type', $type )->orderBy('updated_at', 'desc')->get();
            return view('admin.'.$type.'.index')->with('events', $events);
        } else {
            return view('errors.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        if ( $type == 'event') {
            $event      = new Event();
            $location   = new Location();
            $date       = Carbon::now();
            $day        = $date->day;
            $month      = $date->month;
            $year       = $date->year;
            $dmy        = $year.'-'.$month.'-'.$day;

            return view('admin.event.create', compact('event', 'dmy'));

        } elseif ( $type == 'video') {

            $event      = new Video();
            return view('admin.video.create', compact('event'));

        } else {
            return view('errors.404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {


        if ($type == 'event') {

            $this->validate($request, [
                'title'=>'required|unique:events|max:50',
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
                'image[]'   => ['required'  => 'One image is requred',
                                'image'     => 'Make sure the image is a .jpg, .png or .gif',],
            ]);


            $event = new Event();
            $location = new Location();

            $event->title       = $request->title;
            $event->content     = $request->content;
            $event->start_date  = str_replace('-','/',$request->start_date);
            $event->end_date    = str_replace('-','/',$request->end_date);
            $event->start_time  = $request->start_time;
            $event->end_time    = $request->end_time;
            $event->type        = $request->type;
            $event->status      = $request->status;
            $event->slug        = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $event->title)));

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
        } elseif ( $type == 'video' ) {

            $event = new Video();

            $event->title       = $request->title;
            $event->description = $request->description;
            $event->player      = $request->player;
            if( $request->player == 'youtube') {
                $event->video       = substr($request->video, -11);
            } elseif ( $request->player == 'vimeo') {
                $event->video       = substr($request->video, -9);
            }
            $event->slug        = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $event->title)));

            $event->save();

            return redirect('/admin/'.$type.'/'.$event->slug.'/edit');
        } else {
            return view('errors.404');
        }

        if ( isset($request->preview) ) {
            return redirect('/event/'.$event->slug);
        } else {
            \Session::flash('created', 'The '.$event->title.' event has been created.');
            return redirect('/admin/event/'.$event->slug.'/edit');
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
    public function edit($type, $id)
    {
        if ( $type == 'event' || $type == 'page') {
            try {
                $event = Event::where('slug', $id)->where('type', $type)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            return view('admin.'.$type.'.edit', compact('event'));
        
        } elseif ( $type == 'staff' ) {
              
            try {
                $event = Staff::where('slug', $id)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            return view('admin.staff.edit', compact('event'));

        } elseif ( $type == 'video') {
            
            try {
                $event = Video::where('slug', $id)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            return view('admin.video.edit', compact('event'));

        } else {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {

        if ( $type == 'event' || $type == 'page' ) {
            try {
                $event = Event::where('slug', $id)->where('type', $type)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            if ( $type == 'event') {

                $this->validate($request, [
                'title'     =>'required|max:50',
                'content'   =>'required|max:10000',
                'start_date'=>'required|date|before:end_date',
                'end_date'  =>'required|date|after:start_date',
                'start_time'=>'date_format:H:i|before:end_time',
                'end_time'  =>'date_format:H:i|after:start_time',
                'number'    =>'max:12',
                'street'    =>'max:40',
                'suburb'    =>'max:40',
                'area'      =>'max:40',
                'country'   =>'max:30',
                'image[]'   =>'image',
                ]);

                if ( $request->status == 0 || $request->status == 1 ) {
                    $event->status = $request->status;
                } elseif ( $request->status == 2 ) {
                    foreach ( $event->images as $image ) {

                        $original = 'img/site/original/'; 
                        $sliderPath = 'img/site/slider/';
                        $galleryThumbPath = 'img/site/gallery/thumbnail/';
                        $galleryPrevPath = 'img/site/gallery/preview/';
                        $thumbnail = 'img/site/thumbnail/';

                        $imagedb = Image::where('id', $image->id)->first();
                        \File::delete([$sliderPath.$imagedb->image , $galleryPrevPath.$imagedb->image , $galleryThumbPath.$imagedb->image, $thumbnail.$imagedb->image, $original.$imagedb->image ]);
                        EventImage::where('event_id', $event->id)->where('image_id', $image->id)->delete();
                        $imagedb->delete();
                    }
                    $event->delete();
                    return redirect('/admin/'.$type.'/');
                }

                $event->title       = $request->title;
                $event->content     = $request->content;
                $event->start_date  = str_replace('-','/',$request->start_date);
                $event->end_date    = str_replace('-','/',$request->end_date);
                $event->start_time  = $request->start_time;
                $event->end_time    = $request->end_time;

                $event->save();

                $event->locations->number       = $request->number;
                $event->locations->street       = $request->street;
                $event->locations->suburb       = $request->suburb;
                $event->locations->area         = $request->area;
                $event->locations->country      = $request->country;
                $event->locations->location_map = $request->number.'+'.$request->street.',+'.$request->suburb.',+'.$request->area.',+'.$request->country;
                $event->locations->location_map = str_replace(' ','+',$event->locations->location_map);
                $event->locations->save();


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
            } elseif ( $type == 'page') {
                $event->content = $request->content;
                $event->save();
            }
        } elseif ( $type == 'staff' ) {

            try {
                $event = Staff::where('slug', $id)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            $event->title = $request->title;
            $event->name = $request->name;
            $event->slug        = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $event->name)));


            $original = 'img/site/original/'; 
            $staff = 'img/site/staff/';
                
                if ( $request->hasFile('photo') ) {

                    if ( $event->image != 'default.png') {
                        \File::delete([$original.$event->image, $staff.$event->image]);
                    }

                    $fileName = uniqid().'.'.$request->file('photo')->getClientOriginalName();
                    
                    $imageSource = \Image::make($request->file('photo'));

                    $imageSource->save($original.$fileName);

                    \Image::make($request->file('photo'))->fit(190, 190)
                            ->save($staff.$fileName, 80);

                    $event->image = $fileName;
                }

            $event->save();
            return redirect('/admin/'.$type.'/');
           
        } elseif ( $type == 'video') {

            try {
                $event = Video::where('slug', $id)->firstOrFail();
            } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return view('errors.pageNotFound');
            }

            $event->title       = $request->title;
            $event->description = $request->description;
            $event->player      = $request->player;
            if( $request->player == 'youtube') {
                $event->video       = substr($request->video, -11);
            } elseif ( $request->player == 'vimeo') {
                $event->video       = substr($request->video, -9);
            }
            $event->slug        = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $event->title)));

            $event->save();
            return redirect('/admin/'.$type.'/');

        } else {
            return view('errors.404');
        }

        if ( isset($request->preview) ) {
            return redirect('/'.$type.'/'.$event->slug);
        } else {
            return redirect('/admin/'.$type.'/'.$event->slug.'/edit');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        try {
            $event = Event::where('slug', $id)->where('type', $type)->firstOrFail();
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return view('errors.pageNotFound');
        }

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
