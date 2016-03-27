<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function getNews(Request $request){

        $perPage = 20;

        $pageNum = $request->input('page', 1);

        $results = \App\News::with('sandboxes')
            ->where('publish_at',  '<=', DB::raw('NOW()'))
            ->get()->sortByDesc('publish_at');
        $page = $results->forPage($pageNum,$perPage)->values();

        return response()->json(array(
            "_metadata" => array(
                "page" => intval($pageNum),
                "page_count" => ceil($results->count()/$perPage),
                "total_count" => $results->count(),
            ),
            "news" => $page,
        ));
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
