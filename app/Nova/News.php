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
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class News extends Resource
{
    use HasSortableRows,TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\News::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
                ->hideFromIndex(),
            NovaTabTranslatable::make([
                Text::make(__('Title'),'title')
                    ->rules('required', 'max:255')
                    ->sortable(),
                Text::make(__('Author'),'author')
                    ->rules('max:255')
                    ->sortable(),
                Text::make(__('Photographer'),'photographer')
                    ->rules('max:255')
                    ->sortable()
                    ->hideFromIndex(),
                Text::make(__('Translator'),'translator')
                    ->rules('max:255')
                    ->sortable()
                    ->hideFromIndex(),
                Textarea::make(__('Short description'),'short_description')
                    ->hideFromIndex(),
                NovaTinyMCE::make(__('Description'),'description')
                    ->hideFromIndex(),
            ]),
            Date::make(__('Date'),'created_at'),
            FilemanagerField::make('Image (750 x 520)','image')
                ->filterBy('Image')
                ->displayAsImage(),
            Boolean::make('Top')
                ->trueValue('1')
                ->falseValue('0')
                ->sortable(),
            Multiselect::make(__('Similar news'),'similar')
                ->options($this->getNews())
                ->max(3)
                ->reorderable()
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

    public function getNews(){
        $news = \App\Models\News::published()->pluck('title', 'id');
        return $news;
    }

}
