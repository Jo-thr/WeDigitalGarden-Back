<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CookieBannerWithLangCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="region_cookie_banner_with_lang_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/region_cookie_with_lang_banner_resource")),
     * )
     */
    public function toArray($request)
    {
        return CookieBannerWithLangResource::collection($this->collection);
    }
}
