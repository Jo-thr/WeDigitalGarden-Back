<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\Page;

class PageResource extends JsonResource
{
    use Page;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * @OA\Schema(
     *      schema="page_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="pages"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"fr", "en"},
     *          @OA\Property(
     *              property="fr",
     *              type="object",
     *              required={"template", "slug", "seo", "data", "resources", "regions"},
     *              @OA\Property(property="template", type="string", description="The template", example="Home"),
     *              @OA\Property(property="slug", type="string", description="The slug", example="home"),
     *              @OA\Property(
     *              property="seo",
     *              type="object",
     *              required={"title", "description", "image", "keywords", "follow"},
     *                  @OA\Property(property="title", type="string", description="The title of seo of page", example=""),
     *                  @OA\Property(property="description", type="string", description="The description of seo of page", example=""),
     *                  @OA\Property(property="image", type="string", description="The image of seo of page", example="http://localhost:4646/storage/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="keywords", type="string", description="The keywords of seo of page", example=""),
     *                  @OA\Property(property="follow", type="string", description="The follow of seo of page", example=""),
     *              ),
     *              @OA\Property(property="data", type="object", description="The data", example=""),
     *              @OA\Property(property="resources", type="object", description="The data", example=""),
     *              @OA\Property(property="regions", type="object", description="The data", example=""),
     *          ),
     *          @OA\Property(
     *             property="en",
     *              type="object",
     *              required={"template", "slug", "seo", "data", "resources", "regions"},
     *              @OA\Property(property="template", type="string", description="The template", example="Home"),
     *              @OA\Property(property="slug", type="string", description="The slug", example="home"),
     *              @OA\Property(
     *              property="seo",
     *              type="object",
     *              required={"title", "description", "image", "keywords", "follow"},
     *                  @OA\Property(property="title", type="string", description="The title of seo of page", example=""),
     *                  @OA\Property(property="description", type="string", description="The description of seo of page", example=""),
     *                  @OA\Property(property="image", type="string", description="The image of seo of page", example="http://localhost:4646/storage/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="keywords", type="string", description="The keywords of seo of page", example=""),
     *                  @OA\Property(property="follow", type="string", description="The follow of seo of page", example=""),
     *              ),
     *              @OA\Property(property="data", type="object", description="The data", example=""),
     *              @OA\Property(property="resources", type="object", description="The data", example=""),
     *              @OA\Property(property="regions", type="object", description="The data", example=""),
     *          ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/pages/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $medias = $this->getMedia();
        $additionnalData = $this->initAdditionalData($this->template);

        $data = [];
        $explode = explode('_', $this->locale);
        $data[$explode[0]] = [
            'template' => $this->template,
            'slug' => $this->slug,
            'seo' => [
                'title' => $this->seo_title,
                'description' => $this->seo_description,
                'image' => url('/storage/'.$this->seo_image),
                'keywords' => $this->keywords,
                'follow' => $this->seo_follow,
            ],
            'data' => json_decode($this->data, true),
            'resources' => $additionnalData['models'],
            'regions' => $additionnalData['regions']
        ];

        if($medias) {
            foreach($medias as $key => $media) {
                if($data[$explode[0]]['data'])
                    $data[$explode[0]]['data'][$key] = array_merge($data[$explode[0]]['data'][$key], $media);
            }
        }

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'template' => $children['template'],
                'slug' => $children['slug'],
                'seo' => [
                    'title' => $children['seo_title'],
                    'description' => $children['seo_description'],
                    'image' => url('/storage/'.$children['seo_image']),
                    'keywords' => $children['keywords'],
                    'follow' => $children['seo_follow'],
                ],
                'data' => json_decode($children['data']),
                'resources' => $additionnalData['models'],
                'regions' => $additionnalData['regions']
            ];

            if($medias) {
                foreach($medias as $keyMedia => $media) {
                    if($data[$key]['data'])
                        $data[$key]['data'][$keyMedia] = array_merge($data[$key]['data'][$keyMedia], $media);
                }
            }
        }

        return [
            'type' => 'pages',
            'id' => $this->id,
            'attributes' => $data,
            'links' => [
                'self' => route('page.id', ['id' => $this->id])
            ]
        ];
    }
}
