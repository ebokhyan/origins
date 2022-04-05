<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Contributor extends Model implements Sortable
{
    use HasFactory,HasTranslations,SortableTrait;

    public $translatable = ['full_name', 'position', 'bio'];
    protected $appends = ["similar_stories"];
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

    public function getSimilarStoriesAttribute(){
        return Article::published()->whereIn('id', json_decode($this->similar))->get();
    }
}
