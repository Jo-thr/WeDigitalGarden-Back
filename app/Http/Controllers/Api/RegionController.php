<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MultiLanguage;

class RegionController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of regions ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/regions",
     *     tags={"Region"},
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
     *          description="A regions collection",
     *          @OA\JsonContent(ref="#/components/schemas/region_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A regions collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('region');
    }

    /**
     * Display a collection of regions with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/regions/{lang}",
     *     tags={"Region"},
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
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="A regions collection",
     *          @OA\JsonContent(ref="#/components/schemas/region_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A regions collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('region', null, $lang);
    }

    /**
     * Display the specified region resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/regions/{id}",
     *     tags={"Region"},
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
     *          description="Numeric ID of the region to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One region",
     *          @OA\JsonContent(ref="#/components/schemas/region_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A region not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('region', $id);
    }

    /**
     * Display the specified region resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/regions/{slug}",
     *     tags={"Region"},
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
     *          name="slug",
     *          in="path",
     *          required=true,
     *          description="String ID of the region to get",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One region",
     *          @OA\JsonContent(ref="#/components/schemas/region_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A region not found"
     *     )
     * )
     */
    public function getOneBySlug($slug)
    {
        return $this->initMultiLanguage('region', $slug);
    }

    /**
     * Display the specified region with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/regions/{id}/{lang}",
     *     tags={"Region"},
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
     *          description="Numeric ID of the region to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One region",
     *          @OA\JsonContent(ref="#/components/schemas/region_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A region not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('region', $id, $lang);
    }

    /**
     * Display the specified expertise with specific language resource.
     *
     * @param  string $slug
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/regions/{slug}/{lang}",
     *     tags={"Region"},
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
     *          name="slug",
     *          in="path",
     *          required=true,
     *          description="String ID of the region to get",
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One region",
     *          @OA\JsonContent(ref="#/components/schemas/region_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A region not found"
     *     )
     * )
     */
    public function getOneBySlugWithLang($slug, $lang)
    {
        return $this->initMultiLanguage('region', $slug, $lang);
    }
}