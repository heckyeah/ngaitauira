<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\EventImage;
use App\Image;
use App\Location;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('status', '1')->where('type', 'event')->get();
        $images = Image::orderBy(\DB::raw('RAND()'))->take(4)->get();

        return view('event.index', compact('events', 'images', 'now'));
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
    public function show($id)
    {

        $event = Event::where('id', $id)->first();
        $location = Location::where('event_id', $event->id)->firstOrFail();
        $slider = EventImage::where('event_id', $id)->orderBy(\DB::raw('RAND()'))->take(4)->get();
        $gallery = EventImage::where('event_id', $id)->first();

        if ($event->status == 1 ) {
            return view('event.show', compact('event','location','slider','gallery'));
        } else {
            return redirect('/event/');
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
        try {
            $event = Event::where('priviledge', \Auth::user()->priviledge)->where('id', $id)->firstOrFail();
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return view('errors.captureNotFound');
        }


        return view('event.show', compact('event'));


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
