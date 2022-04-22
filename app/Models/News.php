<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class News extends Model implements Sortable
{
    use HasSlug,HasFactory,HasTranslations,SortableTrait;

    protected $table = 'news';
    public $translatable = ['title', 'author', 'photographer', 'translator', 'short_description','description','seo_title','seo_description'];
    protected $casts = ['created_at' => 'date:d F, Y','title' => 'json'];
    protected $appends = ["date","type"];
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

    public function scopeTop($query)
    {
        return $query->published()->where('top', '1')->orderBy('sort_order', 'ASC');
    }

    public function getDateAttribute(){
        return date('d F, Y', strtotime($this->created_at));
    }

    public function getTypeAttribute(){
        return 'news';
    }
}
