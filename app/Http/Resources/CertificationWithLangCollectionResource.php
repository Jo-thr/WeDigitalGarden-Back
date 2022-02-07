<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CertificationWithLangCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="certification_with_lang_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/certification_with_lang_resource")),
     *      @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/framework/certifications/fr")
     *      ),
     * )
     */
    public function toArray($request)
    {
        return CertificationWithLangResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
           'links'    => [
               'self' => route('framework.certification.lang',  ['lang' => last(request()->segments())]),
           ],
       ];
    }
}
