<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Location;


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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = new Event();
        $event = new Location();

        return view('admin.event.create')->with(compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location();

        $event = new Event();

        $event->title       = $request->title;
        $event->content     = $request->content;
        $event->start_date  = $request->start_date;
        $event->end_date    = $request->end_date;
        $event->start_time  = $request->start_time;
        $event->end_time    = $request->end_time;

        $event->save();

        $location->number       = $request->number;
        $location->street       = $request->street;
        $location->suburb       = $request->suburb;
        $location->area         = $request->area;
        $location->country      = $request->country;
        $location->location_map = $request->number.'+'.$request->street.'+,'.$request->suburb.'+,'.$request->area.'+,'.$request->country;
        $location->event_id     = $event->id;

        $location->save(); 


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
        $event = Event::findOrFail($id);
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

        $event = Event::findOrFail($id);
        $location = Location::where('event_id', $id)->firstOrFail();


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
        $location->location_map = $request->number.'+'.$request->street.'+,'.$request->suburb.'+,'.$request->area.'+,'.$request->country;
        $location->location_map = str_replace(' ','+',$location->location_map);
        $location->save(); 

        return redirect('/event/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
