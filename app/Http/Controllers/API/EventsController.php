<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function getEvents(){

        $results = \App\Event::with('sandboxes')->get()->sortBy('start_time')->forPage(1,20);
        return response()->json(array(
            'status' => 'success',
            'data' => array(
                'events' => $results,
            )
        ), 200);
    }

    function getEvent($event_id){

        $result = \App\Event::with('sandboxes')->find($event_id);

        if($result != null) {
            return response()->json(array(
                'status' => 'success',
                'data' => array(
                    'event' => $result,
                )
            ), 200);
        }else{
            return response()->json(array(
                'status' => 'error',
                'data' => array('event_id' =>"event_id must be a number"),
            ), 400);
        }
    }
}
