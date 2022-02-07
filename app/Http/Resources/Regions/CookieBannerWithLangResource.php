<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\JsonResource;

class CookieBannerWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="region_cookie_banner_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="regions cookie banner"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "subtitle", "label_button", "label_link", "slug_link"},
     *          @OA\Property(property="title", type="string", description="The title", example="Ce site utilise des cookies"),
     *          @OA\Property(property="subtitle", type="string", description="The subtitle", example="lorem impsun"),
     *          @OA\Property(property="label_button", type="string", description="The label of button", example="accepter"),
     *          @OA\Property(property="label_link", type="string", description="The label of link", example="en savoir plus"),
     *          @OA\Property(property="slug_link", type="string", description="The slug of link", example="http://localhost/condition"),
     *     )
     * )
     */
    public function toArray($request)
    {
        return [
            'type' => 'regions cookie banner',
            'id' => $this->id,
            'attributes' => [
                'title' => json_decode($this->data)->title,
                'subtitle' => json_decode($this->data)->subtitle,
                'label_button' => json_decode($this->data)->label_button,
                'label_link' => json_decode($this->data)->label_link,
                'slug_link' => url(json_decode($this->data)->slug_link),
            ]
        ];
    }
}
