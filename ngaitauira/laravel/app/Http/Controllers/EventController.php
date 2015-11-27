<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\EventImage;
use App\Image;
use App\Staff;
use App\Video;
use App\Location;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {

            $events = Event::where('status', '1')->where('type', $type)->orderBy('updated_at', 'desc')->get();
            $images = Image::orderBy(\DB::raw('RAND()'))->take(4)->get();

            return view($type.'.index', compact('events', 'images', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        if ( $id == 'video' ) {

            $events = Video::all();

            return view('video.show', compact('events'));

        } elseif ( $id == 'staff' ) { 
        
            $events = Staff::all();

            return view('staff.show', compact('events'));

        } elseif ( $id == 'gallery' ) { 
        
            $events = Image::all();

            return view('gallery.show', compact('events'));

        } else { 

            $event      = Event::where('slug', $id)->where('type', $type )->first();

            $location   = Location::where('event_id', $event->id)->first();
            $slider     = EventImage::where('event_id', $event->id)->orderBy(\DB::raw('RAND()'))->take(4)->get();
            $gallery    = EventImage::where('event_id', $event->id)->first();

            if ( $event->type == $type ) {
                if ($event->status == 1 ) {
                    return view( $type.'.show', compact('event','location','slider','gallery'));
                } else {
                    return redirect('/'.$type.'/');
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
