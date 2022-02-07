<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Traits\MultiLanguage;

class MenuController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of menus ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/menus",
     *     tags={"Menu"},
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
     *          description="A menus collection",
     *          @OA\JsonContent(ref="#/components/schemas/menu_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menus collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('menu');
    }

    /**
     * Display a collection of menus with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/menus/{lang}",
     *     tags={"Menu"},
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
     *          description="A menu collection",
     *          @OA\JsonContent(ref="#/components/schemas/menu_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menu collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('menu', null, $lang);
    }

    /**
     * Display the specified menu resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/menus/{id}",
     *     tags={"Menu"},
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
     *          description="Numeric ID of the menu to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One menu",
     *          @OA\JsonContent(ref="#/components/schemas/menu_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menu not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('menu', $id);
    }

    /**
     * Display the specified menu with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/menus/{id}/{lang}",
     *     tags={"Menu"},
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
     *          description="Numeric ID of the menu to get",
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
     *          description="One menu",
     *          @OA\JsonContent(ref="#/components/schemas/menu_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menu not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('menu', $id, $lang);
    }

    /**
     * Display the specified menu resource by slug.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/menus/{slug}",
     *     tags={"Menu"},
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
     *          description="String ID of the menu to get",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One menu",
     *          @OA\JsonContent(ref="#/components/schemas/menu_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menu not found"
     *     )
     * )
     */
    public function getOneBySlug($slug)
    {
        return $this->initMultiLanguage('menu', $slug);
    }

    /**
     * Display the specified menu with specific language resource.
     *
     * @param  int $slug
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/menus/{slug}/{lang}",
     *     tags={"Menu"},
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
     *          description="String ID of the menu to get"
     *     ),
     *     @OA\Parameter(
     *          name="lang",
     *          in="path",
     *          required=true,
     *          description="String for select a specific language",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One menu",
     *          @OA\JsonContent(ref="#/components/schemas/menu_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A menu not found"
     *     )
     * )
     */
    public function getOneBySlugWithLang($slug, $lang)
    {
        return $this->initMultiLanguage('menu', $slug, $lang);
    }
}
