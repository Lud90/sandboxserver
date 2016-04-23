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

class FPController extends Controller
{
    function login(){
        if(\Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    function dashboard(){
        $eventCount = \App\Event::where('start_time', '>', 'NOW()')->count();
        return view('dashboard')->with('eventCount', $eventCount);
    }

    function authenticate(Request $request){
        $auth = \Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'));
        if($auth){
            return redirect()->route('dashboard');
        }
        var_dump($auth);
        return back()->withErrors('Invalid username/password')->withInput();
    }

    function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }

    function forgotPassword(){
        return view('forgotPassword');
    }

    function forgotPasswordSubmit(Request $request){
        $address = $request->input('email');
        \Auth::getReset($request);
        return view('forgotPassword')->withSuccess("If an account with the address $address exists, you will receive an email");
    }
}