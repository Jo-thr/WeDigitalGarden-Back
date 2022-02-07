<?php

namespace App\Http\Controllers\Api\Framework;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\MultiLanguage;

class CertificationController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of Framework certifications ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/framework/certifications",
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
     *          description="A Framework certifications collection",
     *          @OA\JsonContent(ref="#/components/schemas/certification_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A Framework certifications collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('certification');
    }

    /**
     * Display a collection of Framework certifications with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/framework/certifications/{lang}",
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
     *          description="A Framework certifications collection",
     *          @OA\JsonContent(ref="#/components/schemas/certification_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A Framework certifications collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('certification', null, $lang);
    }

    /**
     * Display the specified framework certification resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/framework/certifications/{id}",
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
     *          description="Numeric ID of the framework certification to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One framework certification",
     *          @OA\JsonContent(ref="#/components/schemas/certification_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A framework certification not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('certification', $id);
    }

    /**
     * Display the specified framework certification with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/framework/certifications/{id}/{lang}",
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
     *          description="Numeric ID of the framework certification to get",
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
     *          description="One framework certification",
     *          @OA\JsonContent(ref="#/components/schemas/certification_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A framework certification not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('certification', $id, $lang);
    }
}
