<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactWithLangCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="region_contact_with_lang_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/region_contact_with_lang_resource")),
     * )
     */
    public function toArray($request)
    {
        return ContactWithLangResource::collection($this->collection);
    }
}
