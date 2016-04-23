<?php

namespace App\Http\Controllers\FP;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    /**
     * List admins
     *
     * @return mixed
     */
    function index()
    {
        $admins = \App\User::paginate(10);
        return view('listAdmins')->with('admins', $admins);
    }


    /**
     * Show new admin page
     *
     * @return mixed
     */
    function create(){
        return view('newAdmin');
    }


    /**
     * Save new admin
     *
     * @param Request $request
     * @return mixed
     */
    function store(Request $request){
        //make sure data is valid
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        //if it fails, go back to the editor with errors and old input
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->action('FP\AdminController@index');

    }

    /**
     * Show the edit admin page
     *
     * @param User $admin
     * @return mixed
     */
    function edit(User $admin){
        //the edit admin page is just the new admin page with prefilled data
        return view('newAdmin')->with('admin', $admin);
    }

    /**
     * Update the supplied admin
     *
     * @param User $admin
     * @param Request $request
     * @return mixed
     */
    function update(User $admin, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'confirmed|min:6',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        //only update the password if a new one was provided
        if($request->has('password')) {
            $admin->password = bcrypt($request->input('password'));
        };
        $admin->save();

        return redirect()->action('FP\AdminController@index');
    }

    /**
     * Permanently delete a user
     *
     * @param User $admin
     * @return mixed
     * @throws \Exception
     */
    function destroy(User $admin){
        $admin->delete();
        return redirect()->action('FP\AdminController@index');
    }

}