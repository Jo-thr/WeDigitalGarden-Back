<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="value_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="values"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"title", "logo", "resume", "flip"},
     *              @OA\Property(property="title", type="string", description="The title in french", example="PILOT MMP"),
     *              @OA\Property(property="logo", type="string", description="The logo in french", example=""),
     *              @OA\Property(property="resume", type="string", description="The  resume in french", example="Generate first revenues with early adopters"),
     *              @OA\Property(
     *                  property="flip",
     *                  type="object",
     *                  required={"title_flip", "resume_flip"},
     *                  @OA\Property(property="title_flip", type="string", description="The title when card is flip", example="1 Month"),
     *                  @OA\Property(property="resume_flip", type="object", description="The resume when card is flip", example="No business model")
     *              ),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"title", "logo", "resume", "flip"},
     *              @OA\Property(property="title", type="string", description="The title in french", example="PILOT MMP"),
     *              @OA\Property(property="logo", type="string", description="The logo in french", example=""),
     *              @OA\Property(property="resume", type="string", description="The  resume in french", example="Generate first revenues with early adopters"),
     *              @OA\Property(
     *                  property="flip",
     *                  type="object",
     *                  required={"title_flip", "resume_flip"},
     *                  @OA\Property(property="title_flip", type="string", description="The title when card is flip", example="1 Month"),
     *                  @OA\Property(property="resume_flip", type="object", description="The resume when card is flip", example="No business model")
     *              ),
     *          ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/framework/values/1")
     *     )
     * )
     */
    public function toArray($request)
    {

        $data = [];
        $explode = explode('_', $this->locale);
        $data[$explode[0]] = [
            'title' => $this->title,
            'logo' => $this->logo,
            'resume' => $this->resume,
            'flip' => [
                'title' => $this->title_flip,
                'resume' => $this->resume_flip,
            ]
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'title' => $children['title'],
                'logo' => $this->logo,
                'resume' => $children['resume'],
                'flip' => [
                    'title' => $children['title_flip'],
                    'resume' => $children['resume_flip'],
                ]
            ];
        }

        return [
            'type' => 'values',
            'id' => $this->id,
            'attributes' => [
                $data
            ],
            'links' => [
                'self' => route('framework.value.id', ['id' => $this->id])
            ]
        ];
    }
}
