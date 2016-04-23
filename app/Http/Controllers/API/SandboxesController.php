<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SandboxesController extends Controller
{
    /**
     * Get all sandboxes
     *
     * @return mixed
     */
    function getSandboxes(){
        $results = \App\Sandbox::get()->sortBy('id');

        return response()->json($results, 200);
    }

    /**
     * Get all data on a single sandbox
     *
     * @param $sandbox_id
     * @return mixed
     */
    function getSandbox($sandbox_id){
        $result = \App\Sandbox::find($sandbox_id);

        if($result != null) {
            return response()->json($result, 200);
        }else{
            return response()->json(array(
                'error' => "Invalid sandbox_id",
            ), 400);
        }
    }
}
