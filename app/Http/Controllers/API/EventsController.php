<?php

namespace App\Http\Controllers\API;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function getEvents(Request $request){

        $perPage = 20;

        $pageNum = $request->input('page', 1);

        $results = \App\Event::with('sandboxes')
            ->where('publish_at', '<=', DB::raw('NOW()'))->where('end_time', '>=', DB::raw('CURDATE()'))
            ->get()->sortBy('start_time')->values();
        $page = $results->forPage($pageNum,$perPage);
        return response()->json(array(
            "_metadata" => array(
                "page" => intval($pageNum),
                "page_count" => ceil($results->count()/$perPage),
                "total_count" => $results->count(),
            ),
            "events" => $page,
        ));
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
