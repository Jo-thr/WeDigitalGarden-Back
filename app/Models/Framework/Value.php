<?php

namespace App\Models\Framework;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Value extends Model implements Auditable, Sortable
{
    use \OwenIt\Auditing\Auditable, SortableTrait;
    protected $table = 'framework_values';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

}
