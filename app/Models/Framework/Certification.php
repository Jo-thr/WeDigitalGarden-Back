<?php

namespace App\Models\Framework;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certification extends Model implements Auditable, Sortable, HasMedia
{
    use \OwenIt\Auditing\Auditable, SortableTrait, InteractsWithMedia;
    protected $table = 'framework_certification';

    public $sortable = [
        'order_column_name' => 'level',
        'sort_when_creating' => true,
    ];
}
