<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="region_contact_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/region_contact_resource")),
     * )
     */
    public function toArray($request)
    {
        return ContactResource::collection($this->collection);
    }

}
