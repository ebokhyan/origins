<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Contributor;
use App\Models\Donor;
use App\Models\Photographer;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Translator;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getAboutPage($locale) {
        $page = nova_page_manager_get_page_by_path('about-us', null, $locale);

        if($page) {
            $content = [
                'slug' => $page['slug'],
                'template' => $page['template'],
                'seo' => [
                    'title' => $page['seo_title'],
                    'description' => $page['seo_description'],
                    'image' => $page['seo_image'],
                ],
                'image' => $page['data']->image,
                'description' => $page['data']->description,
                'team' => Team::published()->get(),
                'contributors' => Contributor::published()->get(),
                'translators' => Translator::published()->get(),
                'photographers' => Photographer::published()->get(),
                'donors' => Donor::published()->get(),
                'sponsors' => Sponsor::published()->get(),
                'adds' => Ad::published()->whereIn('id', json_decode($page['data']->top_ad))->get()
            ];
           return view('about_us',['content' => $content]);
        }
        return abort(404);
    }

    public function getDetails(Request $request) {
        switch ($request->type){
            case('team'):
                $details = Team::published()->where('id',$request->id)->first();
                break;
            case('translator'):
                $details = Translator::published()->where('id',$request->id)->first();
                break;
            case('contributor'):
                $details = Contributor::published()->where('id',$request->id)->first();
                break;
            case('photographer'):
                $details = Photographer::published()->where('id',$request->id)->first();
                break;
            default:
                return response()->json(['error' => 'No data found']);
        }
        if(!empty($details)){
            $popup_html = view('partials.info_popup',['details' => $details])->render();
            return $popup_html;
        }
        return response()->json(['error' => 'No data found']);
    }
}


