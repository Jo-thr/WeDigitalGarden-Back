<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValueWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="value_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="values"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "logo", "resume", "flip"},
     *              @OA\Property(property="title", type="string", description="The title in french", example="POC"),
     *              @OA\Property(property="logo", type="string", description="The logo in french", example=""),
     *              @OA\Property(property="resume", type="string", description="The  resume in french", example=""), 
     *              @OA\Property(
     *                  property="flip",
     *                  type="object",
     *                  required={"title_flip", "resume_flip"},
     *                  @OA\Property(property="title_flip", type="string", description="The title when card is flip", example="1 Month"),
     *                  @OA\Property(property="resume_flip", type="object", description="The resume when card is flip", example="No business model")
     *              ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/framework/values/1/fr")
     *     )
     * )
     */
    public function toArray($request)
    {
        return [
            'type' => 'values',
            'id' => $this->id,
            'attributes' => [
                'title' => $this['title'],
                'logo' => $this->logo,
                'resume' => $this['resume'],
                'flip' => [
                    'title' => $this->title_flip,
                    'resume' => $this->resume_flip,
                ]
            ],
            'links' => [
                'self' => route('framework.value.id.lang', ['id' => $this->id, 'lang' => last(request()->segments())])
            ]
        ];
    }
}
