<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Guide;
use App\Models\Recipe;
use Illuminate\Http\Request;

class GuidesController extends Controller
{
    public function getGuides($locale) {
        $content = nova_page_manager_get_page_by_path('guides', null, $locale);
        if($content){
            $guides = Guide::published()->paginate(8);

            $content = [
                'slug' => $content['slug'],
                'template' => $content['template'],
                'seo' => [
                    'title' => $content['seo_title'],
                    'description' => $content['seo_description'],
                    'image' => $content['seo_image'],
                ],
                'title' => $content->data->title,
                'guides' => $guides
            ];
            return view('guides', ['content' => $content]);
        }
        return response()->json(['status' => 'page_not_found'], 404);
    }

    public function getGuidesBySlug($locale,$slug) {
        $guide = Guide::published()->where('slug',$slug)->first();
        if($guide){
            $similarFeatures = Article::published()
                ->whereIn('id', json_decode($guide->similar))
                ->latest()
                ->take(4)
                ->get();
            $add = Ad::published()->where('id',$guide->add_section)->first();
            return view('guides_inner', [
                'similarFeatures' => !empty($similarFeatures) ? $similarFeatures : [],
                'add' => $add,
                'guide' => $guide
            ]);
        }
        return abort(404);
    }
}
