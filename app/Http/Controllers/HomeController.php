<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Banner;
use App\Models\MapProgram;
use App\Models\News;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function getHome($locale){
        $content = nova_page_manager_get_page_by_path('home', null, app()->getLocale());
        if($content){
            $topBanner = Ad::published()->where('id',$content['data']->top_ad)->first();
            $latestArticlesBanner = Banner::published()->where('id',$content['data']->latest_articles_banner)->first();
            $latestNewsBanner = Ad::published()->where('id',$content['data']->latest_news_banner)->first();
            $latestRecipesBanner = Banner::published()->where('id',$content['data']->recipes_banner)->first();
            $content = [
                'name' => $content['name'],
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'top_ad' => $topBanner,
                'mainBanner' => [
                    'image_1440' => $content['data']->main_banner_image_1440,
                    'image_960' => $content['data']->main_banner_image_960,
                    'image_375' => $content['data']->main_banner_image_375,
                    'title' => $content['data']->main_banner_title,
                ],
                'latestArticles' => [
                    'articles' => Article::published()
                        ->latest()
                        ->take(4)
                        ->get()
                        ->makeHidden(['published','updated_at','sort_order'])
                        ->toArray(),
                    'banner' => $latestArticlesBanner,
                ],
                'latestNews' => [
                    'news' => News::published()
                        ->latest()
                        ->take(3)
                        ->get()
                        ->makeHidden(['published','updated_at','sort_order'])
                        ->toArray(),
                    'banner' => $latestNewsBanner,
                ],
                'latestRecipes' => [
                    'recipes' => Recipe::published()
                        ->latest()
                        ->take(4)
                        ->get()
                        ->makeHidden(['published','updated_at','sort_order'])
                        ->toArray(),
                    'banner' => $latestRecipesBanner,
                ],
            ];
            return view('home', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }


    public function getWines($locale) {
        $content = nova_page_manager_get_page_by_path('wines', null, app()->getLocale());
        if($content){
            $content = [
                'name' => $content['name'],
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'image' => $content['data']->image,
                'title' => $content['data']->title,
                'short_description' => $content['data']->short_description,
                'position' => $content['data']->position ? $content['data']->position : 'right',
            ];
            return view('comming_soon', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getShop($locale) {
        $content = nova_page_manager_get_page_by_path('shop', null, app()->getLocale());
        if($content){
            $content = [
                'name' => $content['name'],
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'image' => $content['data']->image,
                'title' => $content['data']->title,
                'short_description' => $content['data']->short_description,
                'position' => $content['data']->position ? $content['data']->position : 'right',
            ];
            return view('comming_soon', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getWineClub($locale) {
        $content = nova_page_manager_get_page_by_path('wine-club', null, app()->getLocale());
        if($content){
            $content = [
                'name' => $content['name'],
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'image' => $content['data']->image,
                'title' => $content['data']->title,
                'short_description' => $content['data']->short_description,
                'position' => $content['data']->position ? $content['data']->position : 'right',
            ];
            return view('comming_soon', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getNewslatter($locale) {
        $content = nova_page_manager_get_page_by_path('newslatter', null, app()->getLocale());
        if($content){
            $content = [
                'name' => $content['name'],
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'image' => $content['data']->image,
                'title' => $content['data']->title,
                'short_description' => $content['data']->short_description,
                'position' => $content['data']->position ? $content['data']->position : 'right',
            ];
            return view('comming_soon', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }
}
