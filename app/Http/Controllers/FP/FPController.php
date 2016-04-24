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

    /**
     * Modification of standard login that redirects
     * if the user is already logged in
     *
     * @return mixed
     */
    function login(){
        if(\Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Loads the dashboard with the data needed for the cards
     *
     * @return mixed
     */
    function dashboard(){
        //get the number of upcoming events
        $eventCount = \App\Event::where('start_time', '>', date('Y-m-d H:i'))->count();

        return view('dashboard')->with('eventCount', $eventCount);
    }

    /**
     * Try to log in with provided credentials
     *
     * @param Request $request
     * @return mixed
     */
    function authenticate(Request $request){
        $auth = \Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'));
        if($auth){
            //logged in, go to dashboard
            return redirect()->route('dashboard');
        }
        return back()->withErrors('Invalid username/password')->withInput();
    }

    /**
     * Log out and return to login page
     * 
     * @return mixed
     */
    function logout(){
        \Auth::logout();
        return redirect()->route('login');
    }
    
    /**
     * Show forgot password page
     * 
     * @return mixed
     */
    function forgotPassword(){
        return view('forgotPassword');
    }

    /**
     * Send an email if the provided address exists
     *
     * Don't tell the user if it was successful, as
     * that would let an attacker know the email is
     * valid
     *
     * @param Request $request
     * @return mixed
     */
    function forgotPasswordSubmit(Request $request){
        $address = $request->input('email');
        \Auth::getReset($request);
        return view('forgotPassword')->withSuccess("If an account with the address $address exists, you will receive an email");
    }
}