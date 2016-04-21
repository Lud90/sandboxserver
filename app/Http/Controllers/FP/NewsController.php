<?php
namespace App\Http\Controllers\FP;

use App\News;
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
            'title' => 'required',
            'author' => 'required',
            'url' => 'url',
            'publish_at' => 'date',
            'image' => 'required|image',
            'snippet' => 'required',
            'content' => 'required',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {

            //handle image
            $path = public_path()."/images/";
            $image = $request->file('image');
            $ext = $image->guessExtension();
            do {
                $name = str_random(12);
            }while(\File::exists($path.$name.'.'.$ext));
            $image->move($path, $name.'.'.$ext);

            //store News
            $news = new News;
            $news->title = $request->input('title');
            $news->author = $request->input('author');
            $news->url = $request->input('url');
            if ($request->has('publish_at')) {
                $news->publish_at = $request->input('publish_at');
            }else{
                $news->publish_at = date('Y-m-d H:i');
            }
            $news->image = $name.'.'.$ext;
            $news->snippet = $request->input('snippet');
            $news->content = $request->input('content');
            $news->save();
            $news->sandboxes()->attach($request->input('sandboxes'));
            return redirect()->action('FP\NewsController@index');
        }
    }

    function edit(News $news){
        $sandboxes = \App\Sandbox::orderBy('name')->get();
        $selectedSandboxes = array();
        foreach($news->sandboxes as $sSandbox){
            array_push($selectedSandboxes, $sSandbox->id);
        }
        return view('newsadd')->with(['news'=> $news, 'sandboxes' => $sandboxes, 'selectedSandboxes' => $selectedSandboxes]);
    }

    function update(News $news, Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'url' => 'url',
            'publish_at' => 'date',
            'image' => 'image',
            'snippet' => 'required',
            'content' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {
            //handle image
            if($request->hasFile('image')) {
                $path = public_path() . "/images/";
                $image = $request->file('image');
                $ext = $image->guessExtension();
                do {
                    $name = str_random(12);
                } while (\File::exists($path . $name . '.' . $ext));
                $image->move($path, $name . '.' . $ext);
                $news->image = $name.','.$ext;
            }

            $news->title = $request->input('title');
            $news->author = $request->input('author');
            $news->url = $request->input('url');
            if ($request->has('publish_at')) {
                $news->publish_at = $request->input('publish_at');
            }else{
                $news->publish_at = date('Y-m-d H:i');
            }
            $news->snippet = $request->input('snippet');
            $news->content = $request->input('content');
            $news->save();
            $news->sandboxes()->attach($request->input('sandboxes'));
            return redirect()->action('FP\NewsController@index');
        }
    }

    function destroy(News $news){
        $news->delete();
        return redirect()->action('FP\NewsController@index');
    }

}