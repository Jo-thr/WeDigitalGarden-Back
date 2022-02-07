<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\MultiLanguage;

class TeamController extends Controller
{
    use MultiLanguage;

    /**
     * Display a collection of teams ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/teams",
     *     tags={"Team"},
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
     *          description="A teams collection",
     *          @OA\JsonContent(ref="#/components/schemas/team_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A teams collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        return $this->initMultiLanguage('team');
    }

    /**
     * Display a collection of teams with specific language ressources.
     *
     * @param string $lang
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/teams/{lang}",
     *     tags={"Team"},
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
     *          description="A teams collection",
     *          @OA\JsonContent(ref="#/components/schemas/team_with_lang_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A teams collection not found"
     *     )
     * )
     *
     */
    public function getAllWithLang($lang)
    {
        return $this->initMultiLanguage('team', null, $lang);
    }

    /**
     * Display the specified team resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/teams/{id}",
     *     tags={"Team"},
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
     *          description="Numeric ID of the team to get",
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One team",
     *          @OA\JsonContent(ref="#/components/schemas/team_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A team not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        return $this->initMultiLanguage('team', $id);
    }

    /**
     * Display the specified team with specific language resource.
     *
     * @param  int $id
     * @param  string $lang
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/teams/{id}/{lang}",
     *     tags={"Team"},
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
     *          description="Numeric ID of the team to get",
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
     *          description="One team",
     *          @OA\JsonContent(ref="#/components/schemas/team_with_lang_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A team not found"
     *     )
     * )
     */
    public function getOneWithLang($id, $lang)
    {
        return $this->initMultiLanguage('team', $id, $lang);
    }
}
