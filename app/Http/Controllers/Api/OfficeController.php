<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\OfficeCollectionResource;
use App\Http\Resources\OfficeResource;

use App\Models\Office;

use App\Traits\Errors;

class OfficeController extends Controller
{
    use Errors;

    /**
     * Display a collection of offices ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/offices",
     *     tags={"Office"},
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
     *          description="A offices collection",
     *          @OA\JsonContent(ref="#/components/schemas/office_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A offices collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        $offices = Office::orderBy('order', 'asc')->get();

        if ($offices) {
            return new OfficeCollectionResource($offices);
        }
         
        return $this->error404();
    }

    /**
     * Display the specified office resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/offices/{id}",
     *     tags={"Office"},
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
     *          name="office_id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(ref="#/components/schemas/resource_id"),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="One office",
     *          @OA\JsonContent(ref="#/components/schemas/office_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A office not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        $office = Office::find($id);

        if ($office) {
            return new OfficeResource($office);
        }
         
        return $this->error404();
    }
}
