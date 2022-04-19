<?php

namespace App\Nova;

use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use OptimistDigital\MultiselectField\Multiselect;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use OptimistDigital\NovaTranslatable\HandlesTranslatable;

class Guide extends Resource
{
    use HasSortableRows,TranslatableTabToRowTrait;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Guide::class;

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
                Textarea::make(__('Short description'),'short_description')
                    ->hideFromIndex(),
                NovaTinyMCE::make('Content before subscription banner','description_1')
                    ->hideFromIndex(),
                NovaTinyMCE::make('Content after subscription banner','description_2')
                    ->hideFromIndex(),
                NovaTinyMCE::make('Content after add banner','description_3')
                    ->hideFromIndex(),

            ]),
            Heading::make('Subscription section'),
            NovaTabTranslatable::make([
                Text::make('Subscription banner title','subscription_title')
                    ->hideFromIndex(),
                Textarea::make('Subscription banner text','subscription_text')
                    ->hideFromIndex(),
            ]),
            FilemanagerField::make('Subscription banner image (728 x 90)','subscription_image')
                ->filterBy('Image')
                ->displayAsImage()
                ->hideFromIndex(),
            FilemanagerField::make('Subscription banner image mobile (300 x 250)','subscription_image_mob')
                ->filterBy('Image')
                ->displayAsImage()
                ->hideFromIndex(),

            Heading::make('Add section'),
            Multiselect::make(__('Content adds section'),'add_section')
                ->options($this->getAdds())
                ->singleSelect()
                ->hideFromIndex(),

            Heading::make('Main'),
            FilemanagerField::make('Image (536 x 500)','image')
                ->filterBy('Image')
                ->displayAsImage(),
            FilemanagerField::make('Cover image (1640 x 400)','cover_image')
                ->filterBy('Image')
                ->displayAsImage()
                ->hideFromIndex(),
            FilemanagerField::make('Cover image mobile (960 x 480)','cover_image_mobile')
                ->filterBy('Image')
                ->displayAsImage()
                ->hideFromIndex(),
            Multiselect::make(__('Similar stories'),'similar')
                ->options($this->getFeatures())
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

    public function getFeatures(){
        $guides = \App\Models\Article::published()->pluck('title', 'id');
        return $guides;
    }

    public function getAdds(){
        $adds = \App\Models\Ad::published()->pluck('title', 'id');
        return $adds;
    }
}
