<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\ClientCollectionResource;
use App\Http\Resources\ClientResource;

use App\Models\Client;

use App\Traits\Errors;

class ClientController extends Controller
{
    use Errors;

    /**
     * Display a collection of clients ressources.
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Get(
     *     path="/api/clients",
     *     tags={"Client"},
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
     *          description="A clients collection",
     *          @OA\JsonContent(ref="#/components/schemas/client_collection_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A clients collection not found"
     *     )
     * )
     *
     */
    public function index()
    {
        $clients = Client::orderBy('order', 'asc')->get();

        if ($clients) {
            return new ClientCollectionResource($clients);
        }
         
        return $this->error404();
    }

    /**
     * Display the specified client resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/clients/{id}",
     *     tags={"Client"},
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
     *          description="One client",
     *          @OA\JsonContent(ref="#/components/schemas/client_resource")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="A client not found"
     *     )
     * )
     */
    public function getOne($id)
    {
        $client = Client::find($id);

        if ($client) {
            return new ClientResource($client);
        }
         
        return $this->error404();
    }
}
