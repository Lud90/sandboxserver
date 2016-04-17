<?php
namespace App\Http\Controllers\FP;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    function index()
    {
        $news = \App\News::orderBy('publish_at')->paginate(10);
        return view('listNews')->with('news', $news);
    }

    function create()
    {
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        return view('newsadd')->with('sandboxes', $sandboxes);
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|bail',
            'description' => 'required',
            'author' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {
            //store News
            $news = new News;
            $news->title = $request->title;
            $news->content = $request->description;
            $news->url = $request->link;
            $news->author = $request->author;
            $news->save();
            return view('newsadd');
        }
    }

    function edit($id){
        $news = \App\News::get($id);
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        return view('newsadd')->with('news', $news)->with('sandboxes', $sandboxes);
    }

    function update(){

    }

    function destroy($id){

    }

}