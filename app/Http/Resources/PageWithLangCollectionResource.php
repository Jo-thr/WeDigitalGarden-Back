<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PageWithLangCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     *
     * @OA\Schema(
     *      schema="page_with_lang_collection_resource",
     *      type="object",
     *      required={"link", "data"},
     *      @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/page_with_lang_resource")),
     *      @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/pages/fr")
     *      ),
     * )
     */
    public function toArray($request)
    {
        return PageWithLangResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
           'links'    => [
               'self' => route('page.lang', ['lang' => last(request()->segments())]),
           ],
       ];
    }
}
