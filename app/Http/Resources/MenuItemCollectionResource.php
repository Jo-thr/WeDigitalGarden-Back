<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuItemCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="menu_item_collection_resource",
     *      type="object",
     *      required={"data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/menu_item_resource")),
     * )
     */
    public function toArray($request)
    {
        return MenuItemResource::collection($this->collection);
    }
}
