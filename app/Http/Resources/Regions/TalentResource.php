<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\JsonResource;

class TalentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="region_talent_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="regions talent"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"title", "subtitle", "dark"},
     *              @OA\Property(property="title", type="string", description="The title", example="Home"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle", example="home"),
     *              @OA\Property(property="dark", type="string", description="The dark mode", example="true"),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"title", "subtitle"},
     *              @OA\Property(property="title", type="string", description="The title", example="Home"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle", example="home")
     *          ),
     *     )
     * )
     */
    public function toArray($request)
    {
        $data = [];
        $explode = explode('_', $this->locale);
        $data[$explode[0]] = [
            'title' => json_decode($this->data)->title,
            'subtitle' => json_decode($this->data)->subtitle,
            'link' => json_decode($this->data)->link,
            'dark' => $this->dark ? true : false,
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'title' => json_decode($children['data'])->title,
                'subtitle' => json_decode($children['data'])->subtitle,
                'link' => json_decode($children['data'])->link,
                'dark' => $children['dark'] ? true : false,
            ];
        }

        return [
            'type' => 'regions talent',
            'id' => $this->id,
            'attributes' => [
                $data
            ]
        ];
    }
}
