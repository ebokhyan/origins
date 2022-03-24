<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Recipe extends Model implements Sortable
{
    use HasFactory, SortableTrait,HasTranslations;

    protected $casts = ['created_at' => 'date:d F, Y'];
    public $translatable = ['title',
        'author',
        'cooks_in',
        'difficulty',
        'type',
        'ingredients',
        'instruction',
        'short_description',
        'description',
        'seo_title',
        'seo_description'];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('published', '1')->orderBy('sort_order', 'ASC');
    }
}
