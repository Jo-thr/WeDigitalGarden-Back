<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class Region extends Model
{
    protected $table = 'nova_page_manager_regions';

    /**
     * Set the children regions.
     *
     * @param  string  $value
     * @return void
     */
    public function setChildrenAttribute($value)
    {
        $this->attributes['children'] = $value;
    }

    public function getMedia($collection)
    {
        return Media::where('model_type', 'OptimistDigital\NovaPageManager\Models\Region')->where('model_id', $this->id)->where('collection_name', $collection)->get();
    }
}
