<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UseCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     *  @OA\Schema(
     *      schema="use_case_with_lang_resource",
     *      type="object",
     *      required={"type", "id", "attributes", "links"},
     *      @OA\Property(property="type", type="string", example="use cases"),
     *      @OA\Property(property="id", ref="#/components/schemas/resource_id"),
     *      @OA\Property(
     *          property="attributes",
     *          type="object",
     *          required={"name", "slug", "background_color", "maniature", "resume", "client", "seo", "header", "content", "satisfaction"},
     *              @OA\Property(property="name", type="string", description="The name of use case ", example="lorem-ipsum"),
     *              @OA\Property(property="slug", type="string", description="The slug of use case ", example="lorem-ipsum"),
     *              @OA\Property(property="background_color", type="string", description="The backgroundcolor of use case ", example="lorem-ipsum"),
     *              @OA\Property(
     *                  property="miniature",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                  @OA\Property(property="url", type="string", description="The url of photo of use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                  @OA\Property(property="custom_properties", type="object", description="The custom properties of photo of use case", example="{'description': 'photo of use case'}")
     *              ),
     *              @OA\Property(property="resume", type="string", description="The resume of use case ", example="lorem-ipsum"),
     *              @OA\Property(property="client", type="string", description="The client of use case ", example="lorem-ipsum"),
     *              @OA\Property(
     *                  property="seo",
     *                  type="object",
     *                  required={"id", "title", "description", "keywords", "follow_type", "image", "sociale", "params", "seo_metaable_id", "image_path"},
     *                  @OA\Property(property="id", type="string", description="The id of seo of use case", example="1"),
     *                  @OA\Property(property="title", type="string", description="The title of seo of use case", example="Titre du SEO"),
     *                  @OA\Property(property="description", type="string", description="The description of seo of use case", example="Description du SEO"),
     *                  @OA\Property(property="keywords", type="string", description="The keywords of seo of use case", example="keywords, SEO"),
     *                  @OA\Property(property="follow_type", type="string", description="The follow_type of seo of use case", example="index, follow"),
     *                  @OA\Property(property="image", type="string", description="The image of seo of use case", example="4oCVFhLkVXGyLZyMMExyI8gXV12nWj0LS46H5Bhv.jpeg"),
     *                  @OA\Property(property="sociale", type="string", description="The sociale of seo of use case", example=""),
     *                  @OA\Property(property="params", type="object", description="The params of seo of use case", example="{'title_format': ':text'},"),
     *                  @OA\Property(property="seo_metaable_id", type="string", description="The seo_metaable_id of seo of use case", example="1"),
     *                  @OA\Property(property="image_path", type="string", description="The image path of seo of use case", example="http://localhost:4646/storage/4oCVFhLkVXGyLZyMMExyI8gXV12nWj0LS46H5Bhv.jpeg"),
     *              ),
     *              @OA\Property(
     *                  property="header",
     *                  type="object",
     *                  required={"title_article", "description", "img_banner"},
     *                  @OA\Property(property="title_article", type="string", description="The title_article of use case ", example="lorem-ipsum"),
     *                  @OA\Property(property="description", type="string", description="The description of use case ", example="lorem-ipsum"),
     *                  @OA\Property(
     *                  property="img_banner",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of img_bannerof use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of img_banner of use case", example="{'description': 'img_banner of use case'}")
     *              ),
     *              @OA\Property(
     *                  property="content",
     *                  type="object",
     *                  required={"subtitle_1", "paragraph_1", "image_1", "subtitle_2", "paragraph_2", "image_2", "subtitle_3", "paragraph_3", "image_3", "image_footer"},
     *                  @OA\Property(property="subtitle_1", type="string", description="The subtitle_1 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(property="paragraph_1", type="string", description="The paragraph_1 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(
     *                  property="image_1",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of image_1 of use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of image_1 of use case", example="{'description': 'image_1 of use case'}"),
     *                  @OA\Property(property="subtitle_2", type="string", description="The subtitle_2 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(property="paragraph_2", type="string", description="The paragraph_2 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(
     *                  property="image_2",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of image_2 of use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of image_2 of use case", example="{'description': 'image_2 of use case'}"),
     *                  @OA\Property(property="subtitle_3", type="string", description="The subtitle_3 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(property="paragraph_3", type="string", description="The paragraph_3 of use case ", example="lorem-ipsum"),
     *                  @OA\Property(
     *                  property="image_3",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of image_3 of use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of image_3 of use case", example="{'description': 'image_3 of use case'}"),
     *                  @OA\Property(
     *                  property="image_footer",
     *                  type="object",
     *                  required={"url", "custom_properties"},
     *                      @OA\Property(property="url", type="string", description="The url of image_footer of use case", example="http://localhost:4646/storage/media/1/0b024b6d74c506b423d90f47d28438e3.jpg"),
     *                      @OA\Property(property="custom_properties", type="object", description="The custom properties of image_footer of use case", example="{'description': 'image_footer of use case'}"),
     *              @OA\Property(
     *                  property="satisfaction",
     *                  type="object",
     *                  required={"title_satisfaction", "sectionColor", "comment", "auteur", "posteAuteur"},
     *                  @OA\Property(property="title_satisfaction", type="string", description="The title_satisfaction of use case", example="{'description': 'title_satisfaction of use case'}"),
     *                  @OA\Property(property="sectionColor", type="string", description="The sectionColor of use case ", example="lorem-ipsum"),
     *                  @OA\Property(property="comment", type="string", description="The comment of use case", example="{'description': 'comment of use case'}"),
     *                  @OA\Property(property="auteur", type="string", description="The auteur of use case", example="{'description': 'auteur of use case'}"),
     *                  @OA\Property(property="posteAuteur", type="string", description="The posteAuteur of use case", example="{'description': 'posteAuteur of use case'}"),
     *              ),
     *     ),
     *     @OA\Property(
     *          property="links",
     *          type="object",
     *          required={"self"},
     *          @OA\Property(property="self", type="string", format="uri", example="/api/usecases/1")
     *     )
     * )
     */
    public function toArray($request)
    {
        $mediaLogo = $this->getMedia('logo');
        $mediaMiniature = $this->getMedia('miniature');
        $mediaBanner = $this->getMedia('img_banner');
        $mediaImage1 = $this->getMedia('image_1');
        $mediaImage2 = $this->getMedia('image_2');
        $mediaImage3 = $this->getMedia('image_3');
        $mediaFooter = $this->getMedia('img_footer');

        $seo = $this->getSeoMeta();
        if($seo && $seo['image_path']) {
            $seo['image_path'] = env('APP_URL').$seo['image_path'];
        }

        $data = [];
        $explode = explode('_', $this['locale']);
        $data[$explode[0]] = [
                'name' => $this->name,
                'slug' => $this->slug,
                'background_color' => $this->background_color,
                'miniature' => [
                    'url' => isset($mediaMiniature [0]) ? $mediaMiniature [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaMiniature [0]) ? $mediaMiniature [0]->custom_properties : ''
                ],
                'resume' => $this->resume,
                'client' => $this->client,
                'logo' => [
                    'url' => isset($mediaLogo[0]) ? $mediaLogo[0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaLogo[0]) ? $mediaLogo[0]->custom_properties : ''
                ],
                'seo' => $seo,
                'header' => [
                    'title_article' => $this->title_article,
                    'description' => $this->description,
                    'img_banner' => [
                        'url' => isset($mediaBanner [0]) ? $mediaBanner [0]->getFullUrl() : '',
                        'custom_properties' => isset($mediaBanner [0]) ? $mediaBanner [0]->custom_properties : ''
                ],
                ],
                'content' => [
                    'subtitle_1' => $this->subtitle_1,
                    'paragraph_1' => $this->paragraph_1,
                    'image_1' => [
                        'url' => isset($mediaImage1 [0]) ? $mediaImage1 [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaImage1 [0]) ? $mediaImage1 [0]->custom_properties : ''
                ],
                    'subtitle_2' => $this->subtitle_2,
                    'paragraph_2' => $this->paragraph_2,
                    'image_2' => [
                        'url' => isset($mediaImage2 [0]) ? $mediaImage2 [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaImage2 [0]) ? $mediaImage2 [0]->custom_properties : ''
                ],
                    'subtitle_3' => $this->subtitle_3,
                    'paragraph_3' => $this->paragraph_3,
                    'image_3' => [
                        'url' => isset($mediaImage3 [0]) ? $mediaImage3 [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaImage3 [0]) ? $mediaImage3 [0]->custom_properties : ''
                ],
                    'image_footer' => [
                        'url' => isset($mediaFooter [0]) ? $mediaFooter [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaFooter [0]) ? $mediaFooter [0]->custom_properties : ''
                ],
                ],
                'satisfaction' => [
                    'title_satisfaction' => $this->title_satisfaction,
                    'section_color' => $this->section_color,
                    'comment' => $this->comment,
                    'auteur' => $this->auteur,
                    'poste_auteur' => $this->poste_auteur,
                ],
        ];

        foreach ($this['children'] as $key => $children) {
            $data[$key] = [
                'name' => $children['name'],
                'slug' => $children['slug'],
                'backgroundColor' => $children['backgroundColor'],
                'miniature' => [
                    'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                'resume' => $children['resume'],
                'client' => $children['client'],
                'logo' => [
                    'url' => isset($mediaLogo[0]) ? $mediaLogo[0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaLogo[0]) ? $mediaLogo[0]->custom_properties : ''
                ],
                'seo' => $seo,
                'header' => [
                    'title_article' => $children['title_article'],
                    'description' => $children['description'],
                    'img_banner' => [
                        'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                        'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                ],
                'content' => [
                    'subtitle_1' => $children['subtitle_1'],
                    'paragraph_1' => $children['paragraph_1'],
                    'image_1' => [
                        'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                    'subtitle_1' => $children['subtitle_2'],
                    'paragraph_1' => $children['paragraph_2'],
                    'image_2' => [
                        'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                    'subtitle_1' => $children['subtitle_3'],
                    'paragraph_1' => $children['paragraph_3'],
                    'image_3' => [
                        'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                    'image_footer' => [
                        'url' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->getFullUrl() : '',
                    'custom_properties' => isset($mediaPhotos [0]) ? $mediaPhotos [0]->custom_properties : ''
                ],
                ],
                'satisfaction' => [
                    'title_satisfaction' => $children['title_satisfaction'],
                    'sectionColor' => $children['sectionColor'],
                    'comment' => $children['comment'],
                    'auteur' => $children['auteur'],
                    'poste_auteur' => $children['poste_auteur'],
                ],
            ];
        }

        return [
            'type' => 'use cases',
            'id' => $this->id,
            'attributes' => [
                $data
            ],
            'links' => [
                'self' => route('use-case.id', ['id' => $this->id])
            ]
        ];
    }
}
