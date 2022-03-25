<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaPageManager\Template;

class RecipesTemplate extends Template
{
    public static $type = 'page';
    public static $name = 'recipes-page';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Heading::make('<p class="text-start">Recipes section</p>')
                ->asHtml(),
        ];
    }
}
