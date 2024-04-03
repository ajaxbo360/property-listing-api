<?php

namespace App\Traits;


trait HttpResponse
{
    /**
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'Request has  been successful',
            'message' => $message,
            'data' => $data
        ], $code);
    }
    protected function error($data, $message = null, $code)
    {
        return response()->json([
            'status' => 'Request has not been successful',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
