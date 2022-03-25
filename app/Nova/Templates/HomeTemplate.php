<?php

namespace App\Nova\Templates;

use App\Models\Ad;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaPageManager\Template;

class HomeTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'home-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            FilemanagerField::make('Main banner image large ','main_banner_image_1440')
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Main banner image medium','main_banner_image_960')
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Main banner image small','main_banner_image_375')
                ->filterBy('Image')
                ->displayAsImage(),
            Text::make('Main banner title','main_banner_title'),
            Multiselect::make(__('Top Ad'),'top_ad')
                ->options($this->getAds())
                ->singleSelect(),
            Multiselect::make(__('Latest Articles banner'),'latest_articles_banner')
                ->options($this->getBanners())
                ->singleSelect(),
            Multiselect::make(__('Latest news Ad'),'latest_news_banner')
                ->options($this->getAds())
                ->singleSelect(),
            Multiselect::make(__('Recipes Banner'),'recipes_banner')
                ->options($this->getBanners())
                ->singleSelect(),

        ];
    }

    public function getAds(){
        $ads = Ad::published()->pluck('title', 'id');
        return $ads;
    }

    public function getBanners(){
        $banners = Banner::published()->pluck('title', 'id');
        return $banners;
    }
}
