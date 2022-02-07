<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="team_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="teams"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"name", "position", "avatar", "description" },
     *              @OA\Property(property="name", type="string", description="The name in french", example="Delivrer"),
     *              @OA\Property(property="position", type="string", description="The position in french", example="1"),
     *              @OA\Property(
     *              property="avatar",
     *              type="object",
     *              required={"url", "custom_properties"},
     *                  @OA\Property(property="url", type="string", description="The url of avatar of team", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="custom_properties", type="object", description="The custom properties of avatar of team", example="{'description': 'Avatar of Asako'}")
     *              ),
     *              @OA\Property(property="description", type="string", description="The description in english", example="Lorem ipsum"),
     *              ),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"name", "position", "avatar", "description"},
     *              @OA\Property(property="name", type="string", description="The name in english", example="DELIVER"),
     *              @OA\Property(property="position", type="string", description="The position in english", example="1"),
     *              @OA\Property(
     *              property="avatar",
     *              type="object",
     *              required={"url", "custom_properties"},
     *                  @OA\Property(property="url", type="string", description="The url of avatar of team", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="custom_properties", type="object", description="The custom properties of avatar of team", example="{'description': 'Avatar of Asako'}")
     *              ),
     *              @OA\Property(property="description", type="string", description="The description in english", example="Lorem ipsum"),
     *              ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/teams/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $avatarItems = $this->getMedia('avatar');
        $drawingItems = $this->getMedia('drawing');

        $data = [];
        $explode = explode('_', $this->locale);
        $data[$explode[0]] = [
            'name' => $this['name'],
            'position' => $this['position'],
            'avatar' => [
                'url' => isset($avatarItems[0]) ? $avatarItems[0]->getFullUrl() : '',
                'custom_properties' => isset($avatarItems[0]) ? $avatarItems[0]->custom_properties : ''
            ],
            'description' => $this['description'],
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'name' => $children['name'],
                'position' => $children['position'],
                'avatar' => [
                    'url' => isset($avatarItems[0]) ? $avatarItems[0]->getFullUrl() : '',
                    'custom_properties' => isset($avatarItems[0]) ? $avatarItems[0]->custom_properties : ''
                ],
                'description' => $children['description'],
            ];
        }

        return [
            'type' => 'teams',
            'id' => $this->id,
            'attributes' => [
                $data
            ],
            'links' => [
                'self' => route('team.id', ['id' => $this->id])
            ]
        ];
    }
}
