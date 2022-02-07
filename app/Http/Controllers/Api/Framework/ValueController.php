<?php

namespace App\Http\Controllers\Api\Framework;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\MultiLanguage;

class ValueController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of Framework values ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/framework/values",
     *     tags={"Framework"},
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
     *          description="A Framework values collection",
     *          @OA\JsonContent(ref="#/components/schemas/value_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A Framework values collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('value');
    }

    /**
     * Display a collection of Framework values with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/framework/values/{lang}",
     *     tags={"Framework"},
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
     *          description="A Framework values collection",
     *          @OA\JsonContent(ref="#/components/schemas/value_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A Framework values collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('value', null, $lang);
    }

    /**
     * Display the specified framework value resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/framework/values/{id}",
     *     tags={"Framework"},
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
     *          description="Numeric ID of the framework value to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One framework value",
     *          @OA\JsonContent(ref="#/components/schemas/value_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A framework value not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('value', $id);
    }

    /**
     * Display the specified framework value with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/Framework values/{id}/{lang}",
     *     tags={"Framework"},
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
     *          description="Numeric ID of the framework value to get",
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
     *          description="One framework value",
     *          @OA\JsonContent(ref="#/components/schemas/value_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A framework value not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('value', $id, $lang);
    }
}