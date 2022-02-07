<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpertiseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="expertise_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="expertises"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"name", "slug", "subtitle", "description", "color"},
     *              @OA\Property(property="name", type="string", description="The name in french", example="Delivrer"),
     *              @OA\Property(property="slug", type="string", description="The slug in french", example="delivrer"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle in french", example="Assurer la transition vers l'agile..."),
     *              @OA\Property(property="description", type="string", description="The description in french", example="Installer la cross disciplinary d'une Digital Factory"),
     *              @OA\Property(property="color", type="string", description="The color in specific language", example="#123456")
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"name", "slug", "subtitle", "description", "color"},
     *              @OA\Property(property="name", type="string", description="The name in english", example="DELIVER"),
     *              @OA\Property(property="slug", type="string", description="The slug in english", example="delivrer"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle in english", example="Ensure the transition to agile"),
     *              @OA\Property(property="description", type="string", description="The description in english", example="Set up cross disciplinary Digital Factory"),
     *              @OA\Property(property="color", type="string", description="The color in specific language", example="#123456")
     *          ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/expertises/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $data = [];
        $explode = explode('_', $this['locale']);
        $data[$explode[0]] = [
            'name' => $this['name'],
            'slug' => $this['slug'],
            'subtitle' => $this['subtitle'],
            'description' => $this['description'],
            'color' => $this['color'],
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'name' => $children['name'],
                'slug' => $children['slug'],
                'subtitle' => $children['subtitle'],
                'description' => $children['description'],
                'color' => $children['color'],
            ];
        }

        return [
            'type' => 'expertises',
            'id' => $this->id,
            'attributes' => [
                $data
            ],
            'links' => [
                'self' => route('expertise.id', ['id' => $this->id])
            ]
        ];
    }
}
