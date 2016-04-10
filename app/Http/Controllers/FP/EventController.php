<?php
/**
 * Created by PhpStorm.
 * User: cole
 * Date: 08/03/16
 * Time: 8:12 PM
 *
 * Currently anyone can use this to submit a new event. Once the admin login is finished we'll
 * have to make sure the user is authorized to do this
 */
namespace App\Http\Controllers\FP;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    function listEvents()
    {
        $events = \App\Event::orderBy('start_time')->paginate(10);
        return view('listEvents')->with('events', $events);
    }

    function addEventCreate()
    {
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        return view('eventadd')->with('sandboxes', $sandboxes);
    }

    function editEvent($id){
        $event = \App\Events::get($id);
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        return view('eventadd')->with('event', $event)->with('sandboxes', $sandboxes);
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|bail',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {
            //store event
            $event = new Event;
            $event->title = $request->title;
            $event->content = $request->description;
            $event->url = $request->link;
            $event->start_time = $request->start;
            $event->end_time = $request->end;
            $event->save();
            return view('eventadd');
        }
    }

    function deleteEvent($id){

    }

}