<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Get events listing by page
     * 
     * @param Request $request
     * @return mixed
     */
    function getEvents(Request $request){

        //Number of events per page
        $perPage = 20;

        //the current page number (use 1 if not provided)
        $pageNum = $request->input('page', 1);

        //get published, upcoming events (including ongoing events)
        $results = \App\Event::with('sandboxes')->where('publish_at', '<=', DB::raw('NOW()'))
            ->where('end_time', '>=', DB::raw('CURDATE()'))
            ->get()->sortBy('start_time')->values();
        //page these results
        $page = $results->forPage($pageNum,$perPage);

        //put in a json response with metadata to allow parsing
        return response()->json(array(
            "_metadata" => array(
                "page" => intval($pageNum),
                "page_count" => ceil($results->count()/$perPage),
                "results" => $results->count(),
            ),
            "events" => $page,
        ));
    }

    /**
     * Get all data on a single event
     *
     * @param $event_id
     * @return mixed
     */
    function getEvent($event_id){
        //get event with associated sandbox data
        $result = \App\Event::with('sandboxes')->find($event_id);

        //print results or fail with 400 error
        if($result != null) {
            return response()->json($result, 200);
        }else{
            return response()->json(array(
                'error' => "event_id must be a number", 400
            ));
        }
    }
}
