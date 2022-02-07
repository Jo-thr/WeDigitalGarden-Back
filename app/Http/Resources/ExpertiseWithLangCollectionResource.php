<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExpertiseWithLangCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="expertise_with_lang_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/expertise_with_lang_resource")),
     *      @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/expertises/fr")
     *      ),
     * )
     */
    public function toArray($request)
    {
        return ExpertiseWithLangResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
            'links'    => [
                'self' => route('expertise.lang', ['lang' => last(request()->segments())]),
            ],
        ];
    }
}
