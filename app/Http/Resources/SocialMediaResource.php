<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialMediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="social_media_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="social media"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "link"},
     *          @OA\Property(property="name", type="string", description="The name of social media", example="LinkedIn"),
     *          @OA\Property(property="link", type="string", description="The link of social media", example="https://www.linkedin.com"),
     *      ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/social-media/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        return [
            'type' => 'social media',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'link' => $this->link,
            ],
            'links' => [
                'self' => route('social-media.id', ['id' => $this->id])
            ]
        ];
    }
}
