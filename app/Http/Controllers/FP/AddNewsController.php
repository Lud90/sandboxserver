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

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddNewsController extends Controller
{
    function addNewsCreate()
    {
        return view('newsadd');
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
}