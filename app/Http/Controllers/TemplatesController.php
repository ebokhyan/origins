<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Banner;
use App\Models\MapProgram;
use App\Models\News;
use App\Models\Recipe;

class TemplatesController extends Controller
{
    public function getHome(){
        $content = nova_page_manager_get_page_by_path('home', null, 'en');
        if($content){
            $topBanner = Ad::published()->where('id',$content['data']->top_ad)->first();
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
                'top_ad' => $topBanner ? $topBanner->image : null,
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

    public function getFeatures(){
        $content = nova_page_manager_get_page_by_path('features', null, 'en');
        if($content){
            $topFeatures= Article::top()
                ->whereIn('id',json_decode($content['data']->top_features))
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            $addBanner = Ad::published()
                ->where('id',$content['data']->horizontal_ad)
                ->first()
                ->makeHidden(['published','created_at','updated_at','sort_order'])
                ->toArray();
            $latestFeatures = Article::published()
                ->whereNotIn('id', json_decode($content['data']->top_features))
                ->latest()
                ->take(4)
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            $verticalBanners = Ad::published()
                ->whereIn('id',json_decode($content['data']->vertical_adds))
                ->get()
                ->makeHidden(['published','created_at','updated_at','sort_order'])
                ->toArray();
            $content = [
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'topFeatures' => $topFeatures,
                'banner' => $addBanner,
                'latestFeatures' => [
                    'articles' => $latestFeatures,
                    'banners' => $verticalBanners,
                ],
            ];
            return view('features', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getFeature($slug){
        $topFeatures = Article::top()->latest()->take(4)->get()->toArray();
        $feature = Article::published()->where('slug',$slug)->first();
        $adds = Ad::published()->where('features','1')->get()->toArray();
        $similarFeatures = Article::published()
            ->whereIn('id', json_decode($feature->similar))
            ->latest()
            ->take(4)
            ->get()
            ->makeHidden(['published','updated_at','sort_order'])
            ->toArray();
        return view('feature_inner', ['content' => $feature, 'topFeatures' => $topFeatures,'similarFeatures' => $similarFeatures, 'adds' => $adds]);
    }
}
