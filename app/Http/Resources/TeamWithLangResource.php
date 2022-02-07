<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="team_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="teams"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "position", "avatar", "color", "description", "drawing", "movie"},
     *          @OA\Property(property="name", type="string", description="The name in french", example="Delivrer"),
     *          @OA\Property(property="position", type="string", description="The position in french", example="delivrer"),
     *          @OA\Property(
     *              property="avatar",
     *              type="object",
     *              required={"url", "custom_properties"},
     *                  @OA\Property(property="url", type="string", description="The url of avatar of team", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="custom_properties", type="object", description="The custom properties of avatar of team", example="{'description': 'Avatar of Asako'}")
     *          ),
     *          @OA\Property(property="color", type="string", description="The color in specific language", example="#123456"),
     *          @OA\Property(property="description", type="string", description="The description in french", example="Lorem ipsum"),
     *          @OA\Property(
     *              property="drawing",
     *              type="object",
     *              required={"url", "custom_properties"},
     *                  @OA\Property(property="url", type="string", description="The url of drawing of team", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="custom_properties", type="object", description="The custom properties of drawing of team", example="{'description': 'Drawing of Asako'}")
     *          ),
     *          @OA\Property(property="movie", type="string", description="The link of movie in french", example="https://www.youtube.com/embed/TYndjeI46")
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/teams/1/fr")
     *     )
     * )
     */
    public function toArray($request)
    {
        $avatarItems = $this->getMedia('avatar');
        $drawingItems = $this->getMedia('drawing');

        return [
            'type' => 'teams',
            'id' => $this->id,
            'attributes' => [
                'name' => $this['name'],
                'position' => $this['position'],
                'avatar' => [
                    'url' => isset($avatarItems[0]) ? $avatarItems[0]->getFullUrl() : '',
                    'custom_properties' => isset($avatarItems[0]) ? $avatarItems[0]->custom_properties : ''
                ],
                'description' => $this['description'],
            ],
            'links' => [
                'self' => route('team.id.lang', ['id' => $this->id, 'lang' => last(request()->segments())])
            ]
        ];
    }
}
