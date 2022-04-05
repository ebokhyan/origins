<?php

namespace App\Nova;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Team extends Resource
{
    use HasSortableRows,TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Team::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'full_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','full_name','position'
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
            NovaTabTranslatable::make([
                Text::make(__('Full name'),'full_name')
                    ->rules('required', 'max:255')
                    ->sortable(),
                Text::make(__('Position'),'position')
                    ->rules('max:255')
                    ->sortable(),
                NovaTinyMCE::make(__('Biography'),'bio')
                    ->hideFromIndex(),
            ]),
            FilemanagerField::make('Image (680 x 880)','image')
                ->filterBy('Image')
                ->displayAsImage(),
            Text::make(__('Facebook'),'facebook')->hideFromIndex(),
            Text::make(__('Instagram'),'instagram')->hideFromIndex(),
            Text::make(__('Twitter'),'twitter')->hideFromIndex(),
            Multiselect::make(__('Similar stories'),'similar')
                ->options($this->getArticles())
                ->max(3)
                ->reorderable()
                ->hideFromIndex(),
            Boolean::make('Published')
                ->trueValue('1')
                ->falseValue('0')
                ->sortable(),
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

    public function getArticles(){
        $articles = \App\Models\Article::published()->pluck('title', 'id');
        return $articles;
    }
}
