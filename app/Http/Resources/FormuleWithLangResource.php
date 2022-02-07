<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormuleWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="formule_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="formules"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "subtitle", "price", "options"},
     *          @OA\Property(property="title", type="string", description="The title in specific language", example="Delivrer"),
     *          @OA\Property(property="subtitle", type="string", description="The subtitle in specific language", example="Assurer la transition vers l'agile..."),
     *          @OA\Property(property="price", type="string", description="The price in specific language", example="450"),
     *          @OA\Property(
     *              property="options",
     *              type="object",
     *              required={"option_1", "option_12"},
     *              @OA\Property(property="option_1", type="boolean", description="The option_1 in specific language", example="true"),
     *              @OA\Property(property="option_12", type="boolean", description="The option_12 in specific language", example="false"),
     *          ),
     *      ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/formules/1")
     *     )
     * )
     */

    public function toArray($request)
    {
        return [
            'type' => 'formules',
            'id' => $this->id,
            'attributes' => [
                'title' => $this['title'],
                'subtitle' => $this['subtitle'],
                'price' => $this['price'],
                'options' => [
                    'option_1' => $this['option_1'],
                    'option_2' => $this['option_2'],
                    'option_3' => $this['option_3'],
                    'option_4' => $this['option_4'],
                    'option_5' => $this['option_5'],
                    'option_6' => $this['option_6'],
                    'option_7' => $this['option_7'],
                    'option_8' => $this['option_8'],
                    'option_9' => $this['option_9'],
                    'option_10' => $this['option_10'],
                    'option_11' => $this['option_11'],
                    'option_12' => $this['option_12'],
                ]
            ],
            'links' => [
                'self' => route('formule.id.lang', ['id' => $this->id, 'lang' => last(request()->segments())])
            ]
        ];
    }
}
