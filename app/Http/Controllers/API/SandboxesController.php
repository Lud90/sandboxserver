<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SandboxesController extends Controller
{
    function getSandboxes(){
        $results = \App\Sandbox::get()->sortBy('id');

        return response()->json(array(
            'error' => false,
            'data' => array(
                'sandboxes' => $results,
            )
        ), 200);
    }

    function getSandbox($sandbox_id){
        $result = \App\Sandbox::find($sandbox_id);

        if($result != null) {
            return response()->json(array(
                'error' => false,
                'data' => array(
                    'sandbox' => $result,
                )
            ), 200);
        }else{
            return response()->json(array(
                'error' => "Invalid sandbox_id",
            ), 400);
        }
    }
}
