<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="office_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="offices"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"address", "photo", "link_gmap"},
     *          @OA\Property(
     *              property="address",
     *              type="object",
     *              required={"address", "postal_code", "city", "country"},
     *              @OA\Property(property="address", type="string", description="The address of office", example="103 rue de Grenelle"),
     *              @OA\Property(property="postal_code", type="string", description="The postal code of office", example="75007"),
     *              @OA\Property(property="city", type="string", description="The city of office", example="Paris"),
     *              @OA\Property(property="country", type="string", description="The country of office", example="France"),
     *          ),
     *          @OA\Property(
     *              property="photo",
     *              type="object",
     *              required={"url", "custom_properties"},
     *              @OA\Property(property="url", type="string", description="The url of photo of office", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *              @OA\Property(property="custom_properties", type="object", description="The custom properties of photo of office", example="{'description': 'photo of Paris office'}")
     *          ),
     *          @OA\Property(property="link_gmap", type="string", description="The google map link of office", example="https://www.google.fr/maps/place/103+rue+de+Grenelle,75007+Paris"),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/offices/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $mediaItems = $this->getMedia('offices');

        return [
            'type' => 'offices',
            'id' => $this->id,
            'attributes' => [
                'address' => [
                    'address' => $this->address,
                    'postal_code' => $this->postal_code,
                    'city' => $this->city,
                    'country' => $this->country,
                ],
                'photo' => [
                    'url' => isset($mediaItems[0]) ? $mediaItems[0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaItems[0]) ? $mediaItems[0]->custom_properties : ''
                ],
                'link_gmap' => 'https://www.google.fr/maps/place/'.str_replace(' ', '+', $this->address).',+'.$this->postal_code.'+'.$this->city
            ],
            'links' => [
                'self' => route('office.id', ['id' => $this->id])
            ]
        ];
    }
}
