<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Traits\MultiLanguage;

class ExpertiseController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of expertises ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/expertises",
     *     tags={"Expertise"},
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
     *          description="A expertises collection",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertises collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('expertise');
    }

    /**
     * Display a collection of expertises with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/expertises/{lang}",
     *     tags={"Expertise"},
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
     *          description="A expertises collection",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertises collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('expertise', null, $lang);
    }

    /**
     * Display the specified expertise resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/expertises/{id}",
     *     tags={"Expertise"},
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
     *          description="Numeric ID of the office to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One expertise",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertise not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('expertise', $id);
    }

    /**
     * Display the specified expertise resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/expertises/{slug}",
     *     tags={"Expertise"},
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
     *          description="String ID of the expertise to get",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One expertise",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertise not found"
     *     )
     * )
     */
    public function getOneBySlug($slug)
    {
        return $this->initMultiLanguage('expertise', $slug);
    }

    /**
     * Display the specified expertise with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/expertises/{id}/{lang}",
     *     tags={"Expertise"},
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
     *          description="Numeric ID of the office to get",
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
     *          description="One expertise",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertise not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('expertise', $id, $lang);
    }

    /**
     * Display the specified expertise with specific language resource.
     *
     * @param  string $slug
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/expertises/{slug}/{lang}",
     *     tags={"Expertise"},
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
     *          description="String ID of the office to get",
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One expertise",
     *          @OA\JsonContent(ref="#/components/schemas/expertise_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A expertise not found"
     *     )
     * )
     */
    public function getOneBySlugWithLang($slug, $lang)
    {
        return $this->initMultiLanguage('expertise', $slug, $lang);
    }
}
