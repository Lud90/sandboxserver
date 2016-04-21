<?php

namespace App\Http\Controllers\FP;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function index()
    {
        $admins = \App\User::paginate(10);
        return view('listAdmins')->with('admins', $admins);
    }

    function create(){
        return view('newAdmin');
    }
    
    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

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

    function edit(User $admin){
        return view('newAdmin')->with('admin', $admin);
    }

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
        if($request->has('password')) {
            $admin->password = bcrypt($request->input('password'));
        };
        $admin->save();

        return redirect()->action('FP\AdminController@index');
    }

    function destroy(User $admin){
        $admin->delete();
        return redirect()->action('FP\AdminController@index');
    }

}