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
    function index()
    {
        $events = \App\Event::orderBy('start_time')->paginate(10);
        return view('listEvents')->with('events', $events);
    }

    function create()
    {
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        return view('eventadd')->with('sandboxes', $sandboxes);
    }

    function edit(Event $event){
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        $selectedSandboxes = array();
        foreach($event->sandboxes as $sSandbox){
            array_push($selectedSandboxes, $sSandbox->id);
        }
        return view('eventadd')->with(['event' => $event, 'sandboxes' => $sandboxes, 'selectedSandboxes' => $selectedSandboxes]);
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'cost' => 'required',
            'url' => 'url',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'image|required',
            'content' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        } else {
            //handle image
            $path = public_path()."/images/";
            $image = $request->file('image');
            $ext = $image->guessExtension();
            do {
                $name = str_random(12);
            }while(\File::exists($path.$name.'.'.$ext));
            $image->move($path, $name.'.'.$ext);

            if($request->has('publish_at')){
                $publish_at = $request->input('publish_at');
            }else{
                $publish_at = date('Y-m-d H:i');
            }

            //store event
            $event = new Event;
            $event->title = $request->input('title');
            $event->cost = $request->input('cost');
            $event->publish_at = $publish_at;
            $event->url = $request->input('url');
            $event->start_time = $request->input('start_time');
            $event->end_time = $request->input('end_time');
            $event->location = $request->input('location');
            $event->image = $name.'.'.$ext;
            $event->snippet = $request->input('snippet');
            $event->content = $request->input('content');
            $event->save();
            $event->sandboxes()->attach($request->input('sandboxes'));
            return redirect()->action('FP\EventController@index');
        }
    }

    function update(Event $event, Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'cost' => 'required',
            'url' => 'url',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'image',
            'content' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        } else {
            //handle image
            if($request->hasFile('image')) {
                $path = public_path() . "/images/";
                $image = $request->file('image');
                $ext = $image->guessExtension();
                do {
                    $name = str_random(12);
                } while (\File::exists($path . $name . '.' . $ext));
                $image->move($path, $name . '.' . $ext);
                $event->image = $name.'.'.$ext;
            }
            if($request->has('publish_at')){
                $publish_at = $request->input('publish_at');
            }else{
                $publish_at = date('Y-m-d H:i');
            }

            $event->title = $request->input('title');
            $event->cost = $request->input('cost');
            $event->publish_at = $publish_at;
            $event->url = $request->input('url');
            $event->start_time = $request->input('start_time');
            $event->end_time = $request->input('end_time');
            $event->location = $request->input('location');

            $event->snippet = $request->input('snippet');
            $event->content = $request->input('content');
            $event->save();
            $event->sandboxes()->attach($request->input('sandboxes'));
            return redirect()->action('FP\EventController@index');
        }
    }

    function destroy(Event $event){
        $event->delete();
        return redirect()->action('FP\EventController@index');
    }

}