<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use OptimistDigital\NovaPageManager\Template;

class CommingSoon extends Template
{
    public static $type = 'page';
    public static $name = 'comming-soon';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            FilemanagerField::make('Image')
                ->filterBy('Image')
                ->displayAsImage(),
            Text::make(__('Title'),'title')
                ->sortable(),
            Textarea::make(__('Short description'),'short_description')
        ];
    }
}
