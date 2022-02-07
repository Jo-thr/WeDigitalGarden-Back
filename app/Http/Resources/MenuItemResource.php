<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="menu_item_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="menu items"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "type", "value", "target", "parameters", "enabled", "children"},
     *          @OA\Property(property="name", type="string", description="The name of menu item", example="Réalisations"),
     *          @OA\Property(property="type", type="string", description="The type of menu item", example="static-url"),
     *          @OA\Property(property="value", type="string", description="The value of menu item", example="value"),
     *          @OA\Property(property="target", type="string", description="The target of menu item", example="target"),
     *          @OA\Property(property="parameters", type="string", description="The parameters of menu item", example="null"),
     *          @OA\Property(property="enabled", type="string", description="The enabled of menu item", example="true"),
     *          @OA\Property(property="children", type="object", description="The children of menu item", ref="#/components/schemas/menu_item_collection_resource"),
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
        return [
            'type' => 'menu items',
            'id' => $this['id'],
            'attributes' => [
                'name' => $this['name'],
                'type' => $this['type'],
                'value' => $this['value'],
                'target' => $this['target'],
                'parameters' => $this['parameters'],
                'enabled' => $this['enabled'],
                'children' => new MenuItemCollectionResource($this['children']),
            ],
        ];
    }
}
