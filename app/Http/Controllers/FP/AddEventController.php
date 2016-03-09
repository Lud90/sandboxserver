<?php
/**
 * Created by PhpStorm.
 * User: cole
 * Date: 08/03/16
 * Time: 8:12 PM
 */
namespace App\Http\Controllers\FP;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddEventController extends Controller
{
    function addEventCreate()
    {
        return view('eventadd');
    }

    function addEvent(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|bail',
            'description' => 'required',
            'location' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
    }
}