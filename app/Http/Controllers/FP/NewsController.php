<?php
namespace App\Http\Controllers\FP;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

    /**
     * List News
     *
     * @return mixed
     */
    function index()
    {
        $news = \App\News::orderBy('publish_at')->paginate(10);
        return view('listNews')->with('news', $news);
    }

    /**
     * Show create news page
     *
     * @return mixed
     */
    function create()
    {
        //get sandboxes for select box
        $sandboxes = \App\Sandbox::orderBy('name')->lists('name', 'id');

        return view('newNews')->with('sandboxes', $sandboxes);
    }

    /**
     * Save new news
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        //make sure input is valid
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'url' => 'url',
            'publish_at' => 'date',
            'image' => 'required|image',
            'snippet' => 'required',
            'content' => 'required',
            'sandboxes' => 'required',

        ]);

        //if input is invalid, go back with list of errors and old input
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }

        //generate random name for image and move to /public/images/
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

        //publish_at is either the provided dateTime or now
        if ($request->has('publish_at')) {
            $news->publish_at = $request->input('publish_at');
        }else{
            $news->publish_at = date('Y-m-d H:i');
        }
        $news->image = $name.'.'.$ext;
        $news->snippet = $request->input('snippet');
        $news->content = $request->input('content');
        $news->save();
        //associate with sandbox, if not already
        $news->sandboxes()->sync($request->input('sandboxes'), false);

        return redirect()->action('FP\NewsController@index');
    }

    /**
     * Show edit news form
     *
     * @param News $news
     * @return mixed
     */
    function edit(News $news){
        //get sandboxes for select box
        $sandboxes = \App\Sandbox::orderBy('name')->lists('name','id');

        //get the sandboxes associated with this event so we can check the right boxes
        $selectedSandboxes = array();
        foreach($news->sandboxes as $sSandbox){
            array_push($selectedSandboxes, $sSandbox->id);
        }

        return view('newNews')->with(['news'=> $news, 'sandboxes' => $sandboxes, 'selectedSandboxes' => $selectedSandboxes]);
    }

    /**
     * Update the provided event
     *
     * @param News $news
     * @param Request $request
     * @return mixed
     */
    function update(News $news, Request $request){
        $v = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'url' => 'url',
            'publish_at' => 'date',
            'image' => 'image',
            'snippet' => 'required',
            'content' => 'required',
            'sandboxes' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        //handle image, if one was provided
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

        //publish at provided date or now
        if ($request->has('publish_at')) {
            $news->publish_at = $request->input('publish_at');
        }else{
            $news->publish_at = date('Y-m-d H:i');
        }

        //update news fields
        $news->title = $request->input('title');
        $news->author = $request->input('author');
        $news->url = $request->input('url');
        $news->snippet = $request->input('snippet');
        $news->content = $request->input('content');
        $news->save();

        //attach if not already attached
        $news->sandboxes()->attach($request->input('sandboxes'));

        return redirect()->action('FP\NewsController@index');
    }

    /**
     * Permanently delete an article
     *
     * @param News $news
     * @return mixed
     * @throws \Exception
     */
    function destroy(News $news){
        $news->delete();
        return redirect()->action('FP\NewsController@index');
    }

}