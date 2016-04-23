<?php

namespace App\Http\Controllers\FP;

use App\Sandbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SandboxController extends Controller
{
    function index()
    {
        $sandboxes = \App\Sandbox::paginate(10);
        return view('listSandboxes')->with('sandboxes', $sandboxes);
    }

    function create(){
        return view('newSandbox');
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'url' => 'url|max:255'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Sandbox::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'url' => $request->input('url')
        ]);
        return redirect()->action('FP\SandboxController@index');

    }

    function edit(Sandbox $sandbox){
        return view('newSandbox')->with('sandbox', $sandbox);
    }

    function update(Sandbox $sandbox, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'url' => 'url|max:255'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $sandbox->name = $request->input('name');
        $sandbox->email = $request->input('email');
        $sandbox->address = $request->input('address');
        $sandbox->url = $request->input('url');
        $sandbox->save();

        return redirect()->action('FP\SandboxController@index');
    }

    function destroy(Sandbox $sandbox){
        $sandbox->delete();
        return redirect()->action('FP\SandboxController@index');
    }

}