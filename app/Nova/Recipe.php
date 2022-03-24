<?php

namespace App\Nova;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Recipe extends Resource
{
    use HasSortableRows,TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Recipe::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            new Panel(__('General'), $this->generalFields()),
            new Panel(__('SEO'), $this->seoFields()),
        ];
    }

    public function generalFields(){
        return [
            Slug::make(__('Slug'),'slug')
                ->separator('-')
                ->rules('required', 'max:255','alpha_dash')
                ->from('title')
                ->hideFromIndex(),
            NovaTabTranslatable::make([
                Text::make(__('Title'),'title')
                    ->rules('required')
                    ->sortable(),
                Text::make(__('Author'),'author')
                    ->rules('required', 'max:255')
                    ->sortable(),
                Textarea::make(__('Short description'),'short_description')
                    ->hideFromIndex(),
                NovaTinyMCE::make(__('Description'),'description')
                    ->hideFromIndex(),
                Text::make(__('Cooks in'),'cooks_in')
                    ->hideFromIndex(),
                Text::make(__('Difficulty'),'difficulty')
                    ->hideFromIndex(),
                Text::make(__('Type'),'type')
                    ->hideFromIndex(),
                NovaTinyMCE::make(__('Ingredient'),'ingredients')
                    ->hideFromIndex(),
                NovaTinyMCE::make(__('Instruction'),'instruction')
                    ->hideFromIndex(),
            ]),
            FilemanagerField::make('Image')
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Instruction image','instruction_image')
                ->filterBy('Image')
                ->hideFromIndex(),
            Text::make(__('Saves'),'saves')
                ->hideFromIndex(),
            Boolean::make('Published')
                ->trueValue('1')
                ->falseValue('0')
                ->sortable(),
        ];
    }

    public function seoFields(){
        return [
            NovaTabTranslatable::make([
            Text::make(__('Title'), 'seo_title')
                ->hideFromIndex(),
            Text::make(__('Description'), 'seo_description')
                ->hideFromIndex(),
            ]),
            Image::make(__('Image'), 'seo_image')
                ->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
