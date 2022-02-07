<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Team extends Model implements Auditable, Sortable, HasMedia
{
    use \OwenIt\Auditing\Auditable, SortableTrait, InteractsWithMedia;
    protected $table = 'teams';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function parseYoutube($id)
    {
        if($id) {
            return 'https://www.youtube.com/embed/'.$id;
        }

        return false;
    }

}
