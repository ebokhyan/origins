<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
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
                ->paginate(6);
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
        $feature = Article::published()->where('slug',$slug)->first();
        if($feature){
            $topFeatures = Article::top()->latest()->take(4)->get()->toArray();
            $adds = Ad::published()->where('features','1')->get()->toArray();
            $similarFeatures = Article::published()
                ->whereIn('id', json_decode($feature->similar))
                ->latest()
                ->take(4)
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            return view('feature_news_inner', [
                'type' => 'features',
                'content' => $feature,
                'top' =>!empty($topFeatures) ? $topFeatures : [],
                'similar' => !empty($similarFeatures) ? $similarFeatures : [],
                'adds' => !empty($adds) ? $adds : []
            ]);
        }
        return abort(404);
    }
}
