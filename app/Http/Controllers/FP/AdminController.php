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

class AdminController extends Controller
{
    function listAdmins()
    {
        $admins = \App\User::paginate(10);
        return view('listAdmins')->with('admins', $admins);
    }

    function newAdmin(){
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

        return \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }

    function editAdmin($id){

    }

    function deleteAdmin($id){
        
    }

}