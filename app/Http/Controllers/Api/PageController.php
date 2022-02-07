<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MultiLanguage;

class PageController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of pages ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/pages",
     *     tags={"Page"},
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
     *          description="A pages collection",
     *          @OA\JsonContent(ref="#/components/schemas/page_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A pages collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('page');
    }

    /**
     * Display a collection of pages with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/pages/{lang}",
     *     tags={"Page"},
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
     *          description="A pages collection",
     *          @OA\JsonContent(ref="#/components/schemas/page_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A pages collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('page', null, $lang);
    }

    /**
     * Display the specified page resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/pages/{id}",
     *     tags={"Page"},
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
     *          description="Numeric ID of the page to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One page",
     *          @OA\JsonContent(ref="#/components/schemas/page_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A page not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('page', $id);
    }

    /**
     * Display the specified page resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/pages/{slug}",
     *     tags={"Page"},
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
     *          description="String ID of the page to get",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One page",
     *          @OA\JsonContent(ref="#/components/schemas/page_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A page not found"
     *     )
     * )
     */
    public function getOneBySlug($slug)
    {
        return $this->initMultiLanguage('page', $slug);
    }

    /**
     * Display the specified page with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/pages/{id}/{lang}",
     *     tags={"Page"},
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
     *          description="Numeric ID of the page to get",
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
     *          description="One page",
     *          @OA\JsonContent(ref="#/components/schemas/page_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A page not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('page', $id, $lang);
    }

    /**
     * Display the specified expertise with specific language resource.
     *
     * @param  string $slug
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/pages/{slug}/{lang}",
     *     tags={"Page"},
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
     *          description="String ID of the page to get",
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One page",
     *          @OA\JsonContent(ref="#/components/schemas/page_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A page not found"
     *     )
     * )
     */
    public function getOneBySlugWithLang($slug, $lang)
    {
        return $this->initMultiLanguage('page', $slug, $lang);
    }
}