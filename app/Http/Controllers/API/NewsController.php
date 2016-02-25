<?php

namespace App\Http\Controllers\API;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function getNews(){

        $results = \App\News::with('sandboxes')->get()->sortByDesc('publish_at')->forPage(1,20);

        return response()->json($results, 200);
    }

    function getArticle($article_id){

        $result = \App\News::with('sandboxes')->find($article_id);

        if($result != null) {
            return response()->json($result, 200);
        }else{
            return response()->json(array(
                'error' => "Invalid article_id",
            ), 400);
        }
    }
}
