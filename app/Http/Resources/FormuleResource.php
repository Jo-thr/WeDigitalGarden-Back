<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="formule_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="formules"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"title", "subtitle", "price", "options"},
     *              @OA\Property(property="title", type="string", description="The title in specific language", example="Delivrer"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle in specific language", example="Assurer la transition vers l'agile..."),
     *              @OA\Property(property="price", type="string", description="The price in specific language", example="450"),
     *              @OA\Property(
     *                  property="options",
     *                  type="object",
     *                  required={"option_1", "option_12"},
     *                  @OA\Property(property="option_1", type="boolean", description="The option_1 in specific language", example="true"),
     *                  @OA\Property(property="option_12", type="boolean", description="The option_12 in specific language", example="false"),
     *              ),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"title", "subtitle", "price", "options"},
     *              @OA\Property(property="title", type="string", description="The title in specific language", example="Delivrer"),
     *              @OA\Property(property="subtitle", type="string", description="The subtitle in specific language", example="Assurer la transition vers l'agile..."),
     *              @OA\Property(property="price", type="string", description="The price in specific language", example="450"),
     *              @OA\Property(
     *                  property="options",
     *                  type="object",
     *                  required={"option_1", "option_12"},
     *                  @OA\Property(property="option_1", type="boolean", description="The option_1 in specific language", example="true"),
     *                  @OA\Property(property="option_12", type="boolean", description="The option_12 in specific language", example="false"),
     *              ),
     *          ),
     *     ),
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
        $data = [];
        $explode = explode('_', $this['locale']);
        $data[$explode[0]] = [
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
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'title' => $children['title'],
                'subtitle' => $children['subtitle'],
                'price' => $children['price'],
                'options' => [
                    'option_1' => $children['option_1'],
                    'option_2' => $children['option_2'],
                    'option_3' => $children['option_3'],
                    'option_4' => $children['option_4'],
                    'option_5' => $children['option_5'],
                    'option_6' => $children['option_6'],
                    'option_7' => $children['option_7'],
                    'option_8' => $children['option_8'],
                    'option_9' => $children['option_9'],
                    'option_10' => $children['option_10'],
                    'option_11' => $children['option_11'],
                    'option_12' => $children['option_12'],
                ]
            ];
        }

        return [
            'type' => 'formules',
            'id' => $this->id,
            'attributes' => [
                $data
            ],
            'links' => [
                'self' => route('formule.id', ['id' => $this->id])
            ]
        ];
    }
}
