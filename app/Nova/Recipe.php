<?php

namespace App\Nova;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Spatie\Sluggable\HasSlug;

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
            Slug::make('Slug')
                ->from('title')
                ->separator('-')
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
                KeyValue::make('Ingredient','ingredients')
                    ->keyLabel('Portion')
                    ->valueLabel('Ingredient')
                    ->actionText('Add ingredient'),
                NovaTinyMCE::make(__('Instruction'),'instruction')
                    ->hideFromIndex(),
                NovaTinyMCE::make(__('Credits'),'credits')
                    ->hideFromIndex(),
            ]),
            FilemanagerField::make('Image (536 x 500)', "image")
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Inner Image (800 x 360)','inner_main_image')
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Instruction image (775 x 1023)','instruction_image')
                ->filterBy('Image')
                ->hideFromIndex()
                ->displayAsImage(),
            Text::make(__('Serves'),'serves')
                ->hideFromIndex(),
            Date::make(__('Date'),'created_at'),
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
