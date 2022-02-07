<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SocialMediaCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="social_media_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/social_media_resource")),
     *      @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/social-media")
     *      ),
     * )
     */
    public function toArray($request)
    {
        return SocialMediaResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('social-media.all'),
            ],
        ];
    }
}
