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

    function editEvent($id){
        $event = \App\Events::get($id);
        return view('eventadd')->with('event', $event);
    }

    function deleteEvent($id){

    }

}