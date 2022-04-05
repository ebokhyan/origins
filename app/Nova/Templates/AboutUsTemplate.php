<?php

namespace App\Nova\Templates;

use App\Models\Ad;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaPageManager\Template;

class AboutUsTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'about-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Text::make(__('Title'),'title'),
            FilemanagerField::make('Image (812 x 469)','image')
                ->filterBy('Image')
                ->displayAsImage(),
            NovaTinyMCE::make(__('Description'),'description')->id('description'),
            Heading::make('<p class="text-start">Team section</p>')
                ->asHtml(),
            Heading::make('<p class="text-start">Contributors | Translators | Photographers | Donors section</p>')
                ->asHtml(),
            Heading::make('<p class="text-start">Sponsors section</p>')
                ->asHtml(),
            Multiselect::make(__('Top Ad'),'top_ad')
                ->options($this->getAds())
                ->max(2)
                ->reorderable(),
        ];
    }

    public function getAds(){
        $ads = Ad::published()->pluck('title', 'id');
        return $ads;
    }
}
