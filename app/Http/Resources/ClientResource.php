<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="client_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="clients"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "logo"},
     *          @OA\Property(property="name", type="string", description="The name of clients", example="Safran"),
     *          @OA\Property(
     *              property="logo",
     *              type="object",
     *              required={"url", "custom_properties"},
     *              @OA\Property(property="url", type="string", description="The url of logo of client", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *              @OA\Property(property="custom_properties", type="object", description="The custom properties of logo of client", example="{'description': 'photo of Paris office'}")
     *          ),
     *      )
     *   )
     */
    public function toArray($request)
    {
        $mediaItems = $this->getMedia('logo');

        return [
            'type' => 'clients',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'logo' => [
                    'url' => isset($mediaItems[0]) ? $mediaItems[0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaItems[0]) ? $mediaItems[0]->custom_properties : ''
                ],
            ],
            'links' => [
                'self' => route('client.id', ['id' => $this->id])
            ]
        ];
    }
}
