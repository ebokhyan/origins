<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\News;

class NewsController extends Controller
{
    public function getNews(){
        $content = nova_page_manager_get_page_by_path('news', null, 'en');
        $topNews_array = !empty($content['data']->top_news) ? json_decode($content['data']->top_news) : [];
        $addBanner = [];
        $verticalBanners = [];
        if($content){
            $topNews= News::top()
                ->whereIn('id',$topNews_array)
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            if(isset($content['data']->horizontal_ad)){
                $addBanner = Ad::published()
                    ->where('id',$content['data']->horizontal_ad)
                    ->first()
                    ->makeHidden(['published','created_at','updated_at','sort_order'])
                    ->toArray();
            }
            $latest3News = News::published()
                ->whereNotIn('id', $topNews_array)
                ->take(3)
                ->get();
            $latestNews = News::published()
                ->whereNotIn('id', $topNews_array)
                ->whereNotIn('id', $latest3News->pluck('id'))
                ->skip(3)
                ->paginate(4);
            if(isset($content['data']->vertical_adds)){
                $verticalBanners = Ad::published()
                    ->whereIn('id',json_decode($content['data']->vertical_adds))
                    ->get()
                    ->makeHidden(['published','created_at','updated_at','sort_order'])
                    ->toArray();
            }
            $content = [
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'topNews' => $topNews,
                'banner' => $addBanner,
                'latestNews' => [
                    'latest3' => $latest3News,
                    'news' => $latestNews,
                    'banners' => $verticalBanners,
                ],
            ];
            return view('news', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getNewsBySlug($slug){
        $news = News::published()->where('slug',$slug)->first();
        if($news){
            $topNews = News::top()->latest()->take(4)->get()->toArray();
            $adds = Ad::published()->where('features','1')->get()->toArray();
            $similarNews = News::published()
                ->whereIn('id', json_decode($news->similar))
                ->latest()
                ->take(4)
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            return view('feature_news_inner', [
                'type' => 'news_inner',
                'content' => $news,
                'top' => !empty($topNews) ? $topNews : [],
                'similar' => !empty($similarNews) ? $similarNews : [],
                'adds' => !empty($adds) ? $adds : []
            ]);
        }
         return abort(404);
    }
}