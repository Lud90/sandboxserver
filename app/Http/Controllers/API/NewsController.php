<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    /**
     * Get news listings by page
     *
     * @param Request $request
     * @return mixed
     */
    function getNews(Request $request){
        
        //number of results per page
        $perPage = 20;

        //the current page number (use 1 if not provided)
        $pageNum = $request->input('page', 1);

        //get published articles
        $results = \App\News::with('sandboxes')
            ->where('publish_at',  '<=', DB::raw('NOW()'))
            ->get()->sortByDesc('publish_at')->values();
        //page the results
        $page = $results->forPage($pageNum,$perPage);

        //put the response in a json object with metadata
        return response()->json(array(
            "_metadata" => array(
                "page" => intval($pageNum),
                "page_count" => ceil($results->count()/$perPage),
                "total_count" => $results->count(),
            ),
            "news" => $page,
        ));
    }

    /**
     * Get a single news article
     *
     * @param $article_id
     * @return mixed
     */
    function getArticle($article_id){
        //get news with associated sandbox data
        $result = \App\News::with('sandboxes')->find($article_id);

        //print results or fail with 400 error
        if($result != null) {
            return response()->json($result, 200);
        }else{
            return response()->json(array(
                'error' => "Invalid article_id",
            ), 400);
        }
    }
}
