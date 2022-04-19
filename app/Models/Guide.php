<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Guide extends Model implements Sortable
{
    use HasSlug,HasFactory,HasTranslations,SortableTrait;

    public $translatable = ['title', 'short_description',
        'description_1',
        'description_2',
        'description_3',
        'subscription_title',
        'subscription_text',
        'seo_title',
        'seo_description'];
    protected $appends = ["type"];
    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('published', '1')->orderBy('sort_order', 'ASC');
    }

    public function getTypeAttribute(){
        return 'guide';
    }
}
