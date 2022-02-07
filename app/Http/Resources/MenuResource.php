<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="menu_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="menus"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"name", "items"},
     *              @OA\Property(property="name", type="string", description="The name in french", example="Menu"),
     *              @OA\Property(property="items", type="string", description="The items in french", ref="#/components/schemas/menu_item_collection_resource")
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"name", "items"},
     *              @OA\Property(property="name", type="string", description="The name in english", example="Menu US"),
     *              @OA\Property(property="items", type="string", description="The items in english", ref="#/components/schemas/menu_item_collection_resource")
     *          ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/menus/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $data = [];
        $explode = explode('_', $this['locale']);
        $data[$explode[0]] = [
            'name' => $this['name'],
            'items' => new MenuItemCollectionResource($this['menuItems']),
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'name' => $this['name'],
                'items' => new MenuItemCollectionResource($children['menuItems']),
            ];
        }
        return [
            'type' => 'menus',
            'id' => $this['id'],
            'attributes' => $data,
            'links' => [
                'self' => route('menu.id', ['id' => $this['id']])
            ]
        ];
    }
}
