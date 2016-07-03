<?php

namespace App\Http\Controllers\API;

// use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\AppUser;

class RegistrationsController extends Controller
{
    /**
     * Register mobile user if data is valid
     *
     * @return true on success
     */
    function register() {
        $request = Request::all();

        // If email is not currently registered
        $v = Validator::make($request, [
            'email' => 'required|unique:app_users',
            'password' => 'required'
        ]);

        // If email is valid and password is valid
        if ($v->fails()) {
            return response()->json(array(
                'error' => "Missing field", 400
            ));
        }

        // Create user account
        $appuser = new AppUser;
        $appuser->email = $request["email"];
        $appuser->password = $request["password"];
        $appuser->save();

        // Great success!
        return response()->json(array(
                'registration' => "success", 200
        ));
    }
}
