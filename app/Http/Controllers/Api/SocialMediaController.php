<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\SocialMediaCollectionResource;
use App\Http\Resources\SocialMediaResource;

use App\Models\SocialMedia;

use App\Traits\Errors;

class SocialMediaController extends Controller
{
    use Errors;

    /**
     * Display a collection of social media ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/social-media",
     *     tags={"Social Media"},
     *      @OA\Parameter(
     *          name="Content-Type",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
     *              example="application/json"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="X-Requested-With",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
     *              example="XMLHttpRequest"
     *          )
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="A social media collection",
     *          @OA\JsonContent(ref="#/components/schemas/social_media_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A social media collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        $socialMedia = SocialMedia::orderBy('order', 'asc')->get();

        if ($socialMedia) {
            return new SocialMediaCollectionResource($socialMedia);
        }
         
        return $this->error404();
    }

    /**
     * Display the specified social media resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/social-media/{id}",
     *     tags={"Social Media"},
     *      @OA\Parameter(
     *          name="Content-Type",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
     *              example="application/json"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="X-Requested-With",
     *          in="header",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
     *              example="XMLHttpRequest"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Numeric ID of the social media to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One social media",
     *          @OA\JsonContent(ref="#/components/schemas/social_media_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A social media not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        $socialMedia = SocialMedia::find($id);

        if ($socialMedia) {
            return new SocialMediaResource($socialMedia);
        }
         
        return $this->error404();
    }
}
