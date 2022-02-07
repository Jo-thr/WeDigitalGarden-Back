<?php

namespace App\Models;

use Gwd\SeoMeta\Traits\SeoMetaTrait;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class UseCase extends Model implements Auditable, Sortable, HasMedia
{
    use \OwenIt\Auditing\Auditable, SortableTrait, InteractsWithMedia, SeoMetaTrait;
    protected $table = 'use_cases';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
