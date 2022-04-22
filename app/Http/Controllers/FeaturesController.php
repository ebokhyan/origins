<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function getFeatures(Request $request,$locale){
        $content = nova_page_manager_get_page_by_path('features', null, $locale);
        if($content){
            $topFeatures= Article::top()
                ->whereIn('id',json_decode($content['data']->top_features))
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            $addBanner = Ad::published()
                ->where('id',$content['data']->horizontal_ad)
                ->first();
            if($addBanner) {
                $addBanner->makeHidden(['published','created_at','updated_at','sort_order'])
                    ->toArray();
            }
            $latestFeatures = Article::published()
                ->whereNotIn('id', json_decode($content['data']->top_features))
                ->paginate(4);
            $verticalBanners = Ad::published()
                ->whereIn('id',json_decode($content['data']->vertical_adds))
                ->get();
            if($verticalBanners) {
                $verticalBanners->makeHidden(['published','created_at','updated_at','sort_order'])
                    ->toArray();
            }

            /*
            * Search
            */
            if($request->has('search')){
                $features = Article::published()
                    ->whereRaw('LOWER(JSON_EXTRACT(title, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
                    ->orWhereRaw('LOWER(JSON_EXTRACT(title, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
                    ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.en")) like ?', ['"%' . strtolower($request->search) . '%"'])
                    ->orWhereRaw('LOWER(JSON_EXTRACT(short_description, "$.hy")) like ?', ['"%' . strtolower($request->search) . '%"'])
                    ->paginate(6);
                if ($request->ajax()) {
                    return view('pagination_partials.search',['items' => $features])->render();
                }
                $content = [
                    'slug' => $content['slug'],
                    'template' => $content['template'],
                    'seo' => [
                        'title' => $content['seo_title'],
                        'description' => $content['seo_description'],
                        'image' => $content['seo_image'],
                    ],
                    'search' => $request->search,
                    'searchFeatures' => [
                        'articles' => $features,
                        'banners' => $verticalBanners,
                    ],
                ];
            }else{
                if ($request->ajax()) {
                    return view('pagination_partials.search',['items' => $latestFeatures])->render();
                }
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
            }
            return view('features', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }
    public function getFeature($locale,$slug){
        $feature = Article::published()->where('slug',$slug)->first();

        if($feature){
            $topFeatures = Article::top()->latest()->take(4)->get()->toArray();
            $adds = Ad::published()->where('features','1')->get()->toArray();
            $sf_ids = !is_null($feature->similar) ? json_decode($feature->similar) : [];
            $similarFeatures = Article::published()
                ->whereIn('id', $sf_ids)
                ->latest()
                ->take(4)
                ->get()
                ->makeHidden(['published','updated_at','sort_order'])
                ->toArray();
            return view('feature_news_inner', [
                'type' => 'features',
                'content' => $feature,
                'top' =>!empty($topFeatures) ? $topFeatures : [],
                'similar' => $similarFeatures,
                'adds' => !empty($adds) ? $adds : []
            ]);
        }
        return abort(404);
    }
}
