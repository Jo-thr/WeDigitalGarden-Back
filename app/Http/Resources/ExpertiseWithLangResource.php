<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpertiseWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="expertise_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="expertises"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "slug", "subtitle", "description"},
     *          @OA\Property(property="name", type="string", description="The name in specific language", example="Delivrer"),
     *          @OA\Property(property="slug", type="string", description="The slug in specific language", example="delivrer"),
     *          @OA\Property(property="subtitle", type="string", description="The subtitle in specific language", example="Assurer la transition vers l'agile..."),
     *          @OA\Property(property="description", type="string", description="The description in specific language", example="Installer la cross disciplinary d'une Digital Factory"),
     *          @OA\Property(property="color", type="string", description="The color in specific language", example="#123456")
     *      ),
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
        return [
            'type' => 'expertises',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'slug' => $this->slug,
                'subtitle' => $this->subtitle,
                'description' => $this->description,
                'color' => $this->color,
            ],
            'links' => [
                'self' => route('expertise.id.lang', ['id' => $this->id, 'lang' => last(request()->segments())])
            ]
        ];
    }
}
