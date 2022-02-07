<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\JsonResource;

class TalentWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="region_talent_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="regions talent"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "subtitle", "dark"},
     *          @OA\Property(property="title", type="string", description="The title", example="Home"),
     *          @OA\Property(property="subtitle", type="string", description="The subtitle", example="home"),
     *          @OA\Property(property="dark", type="string", description="The dark mode", example="true"),
     *      )
     * )
     */
    public function toArray($request)
    {
        return [
            'type' => 'regions talent',
            'id' => $this->id,
            'attributes' => [
                'title' => json_decode($this->data)->title,
                'subtitle' => json_decode($this->data)->subtitle,
                'link' => json_decode($this->data)->link,
                'dark' => $this->dark ? true : false,
            ]
        ];
    }
}
