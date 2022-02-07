<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Traits\MultiLanguage;

class UseCaseController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of use cases ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/usecases",
     *     tags={"Use Case"},
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
     *          description="A use cases collection",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use cases collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('usecase');
    }

    /**
     * Display a collection of use cases with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/usecases/{lang}",
     *     tags={"Use Case"},
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
     *          description="A use cases collection",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use cases collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('usecase', null, $lang);
    }

    /**
     * Display the specified use case resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/usecases/{id}",
     *     tags={"Use Case"},
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
     *          description="One use case",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use case not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('usecase', $id);
    }

    /**
     * Display the specified use case resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/use-cases/{slug}",
     *     tags={"Use Case"},
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
     *          description="String ID of the use case to get",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One use case",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use case not found"
     *     )
     * )
     */
    public function getOneBySlug($slug)
    {
        return $this->initMultiLanguage('usecase', $slug);
    }

    /**
     * Display the specified use case with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/use-cases/{id}/{lang}",
     *     tags={"Use Case"},
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
     *          description="One use case",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use case not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('usecase', $id, $lang);
    }

    /**
     * Display the specified use case with specific language resource.
     *
     * @param  string $slug
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/use-cases/{slug}/{lang}",
     *     tags={"Use Case"},
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
     *          description="String ID of the use case to get",
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One use case",
     *          @OA\JsonContent(ref="#/components/schemas/use_case_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A use case not found"
     *     )
     * )
     */
    public function getOneBySlugWithLang($slug, $lang)
    {
        return $this->initMultiLanguage('usecase', $slug, $lang);
    }
}
