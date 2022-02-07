<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="region_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="regions"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"template", "name", "data"},
     *              @OA\Property(property="template", type="string", description="The template", example="Home"),
     *              @OA\Property(property="name", type="string", description="The name", example="home"),
     *              @OA\Property(property="data", type="object", description="The data", example=""),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"template", "name", "data"},
     *              @OA\Property(property="template", type="string", description="The template", example="Home"),
     *              @OA\Property(property="name", type="string", description="The name", example="home"),
     *              @OA\Property(property="data", type="object", description="The data", example=""),
     *          ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/regions/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $data = [];
        $explode = explode('_', $this->locale);
        $data[$explode[0]] = [
            'name' => $this->name,
            'template' => $this->template,
            'data' => json_decode($this->data, true),
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'name' => $children['name'],
                'template' => $children['template'],
                'data' => json_decode($children['data']),
            ];
        }

        return [
            'type' => 'regions',
            'id' => $this->id,
            'attributes' => $data,
            'links' => [
                'self' => route('region.id', ['id' => $this->id])
            ]
        ];
    }
}
