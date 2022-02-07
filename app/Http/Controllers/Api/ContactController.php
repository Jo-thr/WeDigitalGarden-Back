<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Traits\Email;

class ContactController extends Controller
{
    use Email;

    /**
     * Send a email with data of contact form
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Post(
     *     path="/api/contact",
     *     tags={"Contact"},
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
     *          description="Email is send",
     *     ),
     * )
     *
     */
    public function index(CreateContactRequest $request)
    {
        $slot = [
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'companyName' => $request->companyName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'message' => $request->message
        ];

        try {
            $email = $this->emailInit('contact', $slot);

            return response("Mail sent", 200);
        } catch (\Exception $e) {
            return response("An error occured while email sending", 500);
        }
    }

    /**
     * Send a email with data of contact form
     *
     * @throws \Exception
     * @return array|mixed
     *
     * @OA\Post(
     *     path="/api/contact/startup",
     *     tags={"Contact"},
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
     *          description="Email is send",
     *     ),
     * )
     *
     */
    public function startup(CreateContactRequest $request)
    {
        $slot = [
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'companyName' => $request->companyName,
            'email' => $request->email,
            'formule'=> $request->formule,
            'time' => $request->time,
            'phoneNumber' => $request->phoneNumber,
            'message' => $request->message
        ];

        try {
            $email = $this->emailInit('startup', $slot);

            return response("Mail sent", 200);
        } catch (\Exception $e) {
            return response("An error occured while email sending", 500);
        }
    }
}
