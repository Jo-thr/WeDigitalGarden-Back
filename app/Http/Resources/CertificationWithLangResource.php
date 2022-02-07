<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CertificationWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="certification_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="certifications"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "subtitle", "level", "picture", "color", "flip"},
     *              @OA\Property(property="title", type="string", description="The title in french", example="PILOT MMP"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle in french", example=""),
     *              @OA\Property(property="level", type="string", description="The level in french", example="1"),
     *              @OA\Property(
     *              property="picture",
     *              type="object",
     *              required={"url", "custom_properties"},
     *              @OA\Property(property="url", type="string", description="The url of photo of certification", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *              @OA\Property(property="custom_properties", type="object", description="The custom properties of photo of certification", example="{'description': 'photo of Paris office'}")
     *          ),
     *              @OA\Property(property="color", type="string", description="The color in french", example="#000000"),
     *              @OA\Property(
     *                  property="flip",
     *                  type="object",
     *                  required={"picture", "who", "what", "how"},
     *                  @OA\Property(
     *                      property="picture",
     *                      type="object",
     *                      required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of photo of certification", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of photo of certification", example="{'description': 'photo of Paris office'}")
     *                  ),
     *                  @OA\Property(property="who", type="string", description="The who when card is flip", example="1 Month"),
     *                  @OA\Property(property="what_1", type="object", description="The what 1 when card is flip", example="No business model"),
     *                  @OA\Property(property="what_2", type="object", description="The what 2 when card is flip", example="No business model"),
     *                  @OA\Property(property="what_3", type="object", description="The what 3 when card is flip", example="No business model"),
     *                  @OA\Property(property="how", type="object", description="The how when card is flip", example="No business model")
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
        $mediaItems = $this->getMedia('picture');
        $mediaItemsFlip = $this->getMedia('flip_picture');

        return [
            'type' => 'certifications',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'level' => $this->level,
                "picture" => [
                    'url' => isset($mediaItems[0]) ? $mediaItems[0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaItems[0]) ? $mediaItems[0]->custom_properties : ''
                ],
                "color" => $this->color,
                'flip' => [
                    "picture" => [
                        'url' => isset($mediaItemsFlip[0]) ? $mediaItemsFlip[0]->getFullUrl() : '',
                        'custom_properties' => isset($mediaItemsFlip[0]) ? $mediaItemsFlip[0]->custom_properties : ''
                    ],
                    'who' => $this->who,
                    'what_1' => $this->what_1,
                    'what_2' => $this->what_2,
                    'what_3' => $this->what_3,
                    'how' => $this->how,
                ]
            ],
            'links' => [
                'self' => route('framework.certification.id.lang', ['id' => $this->id, 'lang' => last(request()->segments())])
            ]
        ];
    }
}
