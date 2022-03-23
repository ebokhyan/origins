<?php

namespace App\Nova\Templates;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Banner;
use App\Models\News;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaPageManager\Template;

class NewsTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'news-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Multiselect::make(__('Top news'),'top_news')
                ->options($this->getTopNews())
                ->max(4)
                ->reorderable(),
            Multiselect::make(__('Horizontal Ad'),'horizontal_ad')
                ->options($this->getAds())
                ->singleSelect(),
            Heading::make('<p class="text-start">News section</p>')
                ->asHtml(),
            Multiselect::make(__('Vertical Adds'),'vertical_adds')
                ->options($this->getAds())
        ];
    }

    public function getAds(){
        $ads = Ad::published()->pluck('title', 'id');
        return $ads;
    }
    public function getTopNews(){
        $features = News::top()->pluck('title', 'id');
        return $features;
    }
}
