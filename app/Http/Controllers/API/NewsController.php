<?php

namespace App\Http\Controllers\API;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function getNews(){
        return response()->json(array(
            'error' => false,
            'data' => array(
                'news' => 'articles go here',
            )
        ), 200);
    }

    function getArticle($article_id){
        if(is_numeric($article_id)) {
            return response()->json(array(
                'error' => false,
                'data' => array(
                    'article' => "article $article_id goes here",
                )
            ), 200);
        }else{
            return response()->json(array(
                'error' => "article_id must be a number",
            ), 400);
        }
    }
}
