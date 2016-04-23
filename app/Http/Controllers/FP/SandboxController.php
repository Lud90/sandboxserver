<?php

namespace App\Http\Controllers\FP;

use App\Sandbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SandboxController extends Controller
{

    /**
     * List sandboxes
     *
     * @return mixed
     */
    function index()
    {
        $sandboxes = \App\Sandbox::paginate(10);
        return view('listSandboxes')->with('sandboxes', $sandboxes);
    }

    /**
     * Show create sandbox page
     *
     * @return mixed
     */
    function create(){
        return view('newSandbox');
    }

    /**
     * Store new sandbox
     *
     * @param Request $request
     * @return mixed
     */
    function store(Request $request){
        //make sure fields are valid
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'url' => 'url|max:255'
        ]);

        //if invalid, return with errors and old input
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        //create the sandbox
        Sandbox::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'url' => $request->input('url')
        ]);

        return redirect()->action('FP\SandboxController@index');
    }

    /**
     * Show edit sandbox form
     *
     * @param Sandbox $sandbox
     * @return mixed
     */
    function edit(Sandbox $sandbox){
        return view('newSandbox')->with('sandbox', $sandbox);
    }

    /**
     * Update the provided sandbox
     *
     * @param Sandbox $sandbox
     * @param Request $request
     * @return mixed
     */
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

        //update sandbox fields
        $sandbox->name = $request->input('name');
        $sandbox->email = $request->input('email');
        $sandbox->address = $request->input('address');
        $sandbox->url = $request->input('url');
        $sandbox->save();

        return redirect()->action('FP\SandboxController@index');
    }

    /**
     * Permanently delete a sandbox
     *
     * @param Sandbox $sandbox
     * @return mixed
     * @throws \Exception
     */
    function destroy(Sandbox $sandbox){
        $sandbox->delete();
        return redirect()->action('FP\SandboxController@index');
    }

}