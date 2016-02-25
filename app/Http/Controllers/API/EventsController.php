<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function getEvents(){

        $results = \App\Event::with('sandboxes')->get()->sortBy('start_time')->forPage(1,20);
        return response()->json($results, 200);
    }

    function getEvent($event_id){

        $result = \App\Event::with('sandboxes')->find($event_id);

        if($result != null) {
            return response()->json($result, 200);
        }else{
            return response()->json(array(
                'error' => "event_id must be a number", 400
            ));
        }
    }
}
