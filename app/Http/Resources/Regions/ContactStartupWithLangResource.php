<?php

namespace App\Http\Resources\Regions;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactStartupWithLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="region_contact_startup_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="regions contact startup"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"title", "subtitle", "photo", "inputs"},
     *          @OA\Property(property="title", type="string", description="The title", example="Home"),
     *          @OA\Property(property="subtitle", type="string", description="The subtitle", example="home"),
     *          @OA\Property(
     *              property="photo",
     *              type="object",
     *              required={"url", "custom_properties"},
     *              @OA\Property(property="url", type="string", description="The url of photo of contact", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *              @OA\Property(property="custom_properties", type="object", description="The custom properties of photo of contact", example="{'description': 'photo of Paris office'}")
     *          ),
     *          @OA\Property(
     *                  property="inputs",
     *                  type="object",
     *                  required={"label_input_X", "error_input_X", "label_button", "success_message"},
     *                  @OA\Property(property="label_input_X", type="string", description="The label of input X (X= 1-6)", example="Nom"),
     *                  @OA\Property(property="error_input_X", type="object", description="The error message of input X (X= 1-6)", example="Le nom est obligatoire"),
     *                  @OA\Property(property="label_button", type="object", description="The label of button", example="Envoyer ?"),
     *                  @OA\Property(property="success_message", type="object", description="The success message", example="send"),
     *              ),
     *     )
     * )
     */
    public function toArray($request)
    {
        $mediaItems = $this->getMedia('data->illustration');
        
        return [
            'type' => 'regions contact startup',
            'id' => $this->id,
            'attributes' => [
                'title' => json_decode($this->data)->title,
                'subtitle' => json_decode($this->data)->subtitle,
                'photo' => [
                    'url' => asset('storage/media/'.$mediaItems[0]->id.'/'.$mediaItems[0]->file_name),
                    'custom_properties' => json_decode($mediaItems[0]->custom_properties)
                ],
                'inputs' => [
                    'label_input_1' => json_decode($this->data)->inputs->label_input_1,
                    'error_input_1' => json_decode($this->data)->inputs->error_input_1,
                    'label_input_2' => json_decode($this->data)->inputs->label_input_2,
                    'error_input_2' => json_decode($this->data)->inputs->error_input_2,
                    'label_input_3' => json_decode($this->data)->inputs->label_input_3,
                    'error_input_3' => json_decode($this->data)->inputs->error_input_3,
                    'label_input_4' => json_decode($this->data)->inputs->label_input_4,
                    'error_input_4' => json_decode($this->data)->inputs->error_input_4,
                    'label_input_5' => json_decode($this->data)->inputs->label_input_5,
                    'error_input_5' => json_decode($this->data)->inputs->error_input_5,
                    'label_input_6' => json_decode($this->data)->inputs->label_input_6,
                    'error_input_6' => json_decode($this->data)->inputs->error_input_6,
                    'label_button' => json_decode($this->data)->inputs->label_button,
                    'success_message' => json_decode($this->data)->inputs->success_message,
                    'label_formule' => json_decode($this->data)->inputs->label_formule,
                    'label_select' => json_decode($this->data)->inputs->label_select,
                    'error_select' => json_decode($this->data)->inputs->error_select,
                    'label_select_option_1' => json_decode($this->data)->inputs->label_select_option_1,
                    'label_select_option_2' => json_decode($this->data)->inputs->label_select_option_2,
                ]
            ]
        ];
    }
}
