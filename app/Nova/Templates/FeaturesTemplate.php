<?php

namespace App\Nova\Templates;

use App\Models\Ad;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaPageManager\Template;

class FeaturesTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'feature-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [

            Multiselect::make(__('Top features'),'top_features')
                ->options($this->getTopFiuters())
                ->max(3),
            Multiselect::make(__('Horizontal Ad'),'horizontal_ad')
                ->options($this->getAds())
                ->singleSelect(),
            Heading::make('<p class="text-start">Latest 4 features</p>')
                ->asHtml(),
            Multiselect::make(__('Vertical Adds'),'vertical_adds')
                ->options($this->getAds())
        ];
    }

    public function getAds(){
        $ads = Ad::published()->pluck('title', 'id');
        return $ads;
    }
    public function getTopFiuters(){
        $features = Article::top()->pluck('title', 'id');
        return $features;
    }
}
