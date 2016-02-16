<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function getEvents(){
        return response()->json(array(
            'status' => 'success',
            'news' => 'events go here',
        ), 200);
    }

    function getEvent($event_id){
        if(is_numeric($event_id)) {
            return response()->json(array(
                'status' => 'success',
                'data' => array(
                    'news' => "event $event_id goes here",
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
