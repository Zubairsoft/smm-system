<?php

use Illuminate\Http\JsonResponse;

function sendSuccessResponse($message = 'successful', $data = null, $status_code = 200): JsonResponse
{
    $response = [
        'status' => 'success',
        'message' => $message,
        'data' => $data,
    ];

    return response()->json($response, $status_code);
}


function sendFailedResponse($message = 'failed', $errors = null, $status_code = 404): JsonResponse
{
    $response = [
        'status' => 'failed',
        'message' => $message,
        'data' => $errors
    ];

    return response()->json($response, $status_code);
}
