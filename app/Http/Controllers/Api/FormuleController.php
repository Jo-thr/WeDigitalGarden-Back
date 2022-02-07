<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\MultiLanguage;

class FormuleController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of formules ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/formules",
     *     tags={"Formule"},
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
     *          description="A formules collection",
     *          @OA\JsonContent(ref="#/components/schemas/formule_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A formules collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('formule');
    }

    /**
     * Display a collection of formules with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/formules/{lang}",
     *     tags={"Formule"},
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
     *          description="A formules collection",
     *          @OA\JsonContent(ref="#/components/schemas/formule_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A formules collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('formule', null, $lang);
    }

    /**
     * Display the specified formule resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/formules/{id}",
     *     tags={"Formule"},
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
     *          description="One formule",
     *          @OA\JsonContent(ref="#/components/schemas/formule_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A formule not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('formule', $id);
    }

    /**
     * Display the specified formule with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/formules/{id}/{lang}",
     *     tags={"Formule"},
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
     *          description="One formule",
     *          @OA\JsonContent(ref="#/components/schemas/formule_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A formule not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('formule', $id, $lang);
    }

}
