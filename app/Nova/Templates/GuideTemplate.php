<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaPageManager\Template;

class GuideTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'guide-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Text::make('Title'),
            Heading::make('<p class="text-start">Guides section</p>')
                ->asHtml(),
        ];
    }
}
