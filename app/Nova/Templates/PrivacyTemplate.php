<?php

namespace App\Nova\Templates;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaPageManager\Template;

class PrivacyTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'privacy-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
             Text::make(__('Title'),'title')
                 ->sortable(),
             NovaTinyMCE::make(__('Content'))-> id ('content')
        ];
    }
}
