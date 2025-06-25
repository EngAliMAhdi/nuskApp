<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'code' => 200
        ];


        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'data' => $error,
            'code' => $code
        ];


        if (!empty($errorMessages)) {
            $response['message'] = $errorMessages;
        }


        return response()->json($response, $code, [], JSON_UNESCAPED_UNICODE);
    }
}
