<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Banner;
use App\Models\MapProgram;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function getHome(){
        $content = nova_page_manager_get_page_by_path('home', null);
//        dd($content);
        if($content){
            $latestArticlesBanner = Banner::published()->where('id',$content['data']->latest_articles_banner)->first();
            $latestNewsBanner = Ad::published()->where('id',$content['data']->latest_news_banner)->first();
            $latestRecipesBanner = Banner::published()->where('id',$content['data']->recipes_banner)->first();
            $content = [
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'latestArticlesBanner' => $latestArticlesBanner,
                'latestNewsBanner' => $latestNewsBanner,
                'latestRecipesBanner' => $latestRecipesBanner,
            ];
            return view('home', ['content' => $content]);

        }
        return response()->json(['status' => 'page_not_found'], 404);
    }
}
