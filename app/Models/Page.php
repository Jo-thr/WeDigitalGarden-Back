<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'nova_page_manager_pages';

    /**
     * Set the children page.
     *
     * @param  string  $value
     * @return void
     */
    public function setChildrenAttribute($value)
    {
        $this->attributes['children'] = $value;
    }

    public function getMedia()
    {
        $medias = Media::where('model_type', 'OptimistDigital\NovaPageManager\Models\Page')->where('model_id', $this->id)->get();
        $data = [];
        foreach($medias as $media) {
            $explode = explode('->', $media->collection_name);
            if(count($explode) > 2) {
                $data[$explode[1]]['medias'][] = [
                    'url' => asset('storage/media/'.$media->id.'/'.$media->file_name),
                    'custom_properties' => json_decode($media->custom_properties, true)
                ];
            }
            else {
                $data['medias'][] = [
                    'url' => asset('storage/media/'.$media->id.'/'.$media->file_name),
                    'custom_properties' => json_decode($media->custom_properties, true)
                ];
            }
        }

        return $data;

    }
}
