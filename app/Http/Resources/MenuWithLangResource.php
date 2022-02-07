<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="menu_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="menus"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "items"},
     *              @OA\Property(property="name", type="string", description="The name of menu", example="Menu"),
     *              @OA\Property(property="items", type="string", description="The items of menu", ref="#/components/schemas/menu_item_collection_resource")
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/menus/1/fr")
     *     )
     * )
     */
    public function toArray($request)
    {
        return [
            'type' => 'menus',
            'id' => $this['id'],
            'attributes' => [
                'name' => $this['name'],
                'items' => new MenuItemCollectionResource($this['menuItems']),
            ],
            'links' => [
                'self' => route('menu.id.lang', ['id' => $this['id'], 'lang' => last(request()->segments())])
            ]
        ];
    }
}
