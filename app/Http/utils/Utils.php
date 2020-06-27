<?php

namespace App\Utils;

use JWTAuth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Utils
{
    /*
     *
     * Handle exception
     *
     * @param $exception - The exception to handle
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
     public static function handleException($exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
              'status'  => 'fail',
              'errors'  => $exception->errors()
            ], 422);
        }
        if ($exception instanceof ModelNotFoundException) {
            $modelName = class_basename($exception->getModel());
            $modelName = Str::kebab($modelName);
            $modelName = str_replace('-', ' ', $modelName);
            $modelName = ucfirst($modelName);
            return response()->json([
              'status'  => 'fail',
              'message' => $modelName.' not found'
            ], 404);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json([
              'status' => 'fail',
              'message' => $exception->getMessage()
            ], $exception->getStatusCode());
        }

        return response()->json([
              'status' => 'fail',
              'message' => $exception->getMessage()
            ], 500);
    }

    /*
     *
     * return token and user
     *
     * @param $user - The user to return in response
     * @param $token - The token to return in response
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public static function returnToken($token)
    {
        $user = JWTAuth::user();
        return response()->json([
          'status' => 'success',
          'data'   => $user,
          'token'  => $token,
          'expires_in'  => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    /*
     *
     * return data
     *
     * @param $data - The data to return in response
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public static function returnData($data)
    {
        return response()->json([
          'status' => 'success',
          'data'   => $data
        ]);
    }

    /*
     *
     * Return success message
     *
     * @param $message - The message to return
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public static function returnSuccess($message)
    {
        return response()->json([
          'status' => 'success',
          'message'=> $message
        ]);
    }

    /*
     *
     * Return error message
     *
     * @param $message - The message to return
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public static function returnError($message, $statusCode = 200)
    {
        return response()->json([
          'status' => 'fail',
          'message'=> $message
        ], $statusCode);
    }

    
}
