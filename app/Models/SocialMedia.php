<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class SocialMedia extends Model implements Auditable, Sortable
{
    use \OwenIt\Auditing\Auditable, SortableTrait;
    protected $table = 'social_media';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
}
