<?php

use Illuminate\Http\JsonResponse;

function responseJSON(array $options = []): JsonResponse
{
    $result  = $options['result'] ?? [];
    $errors  = $options['errors'] ?? [];
    $message = $options['message'] ?? null;
    $code    = $options['code'] ?? 200;

    $validCodes = [200, 201, 400, 401, 403, 404, 422, 500];
    if (!in_array($code, $validCodes)) {
        $code = 500;
        $message = 'Invalid status code provided.';
    }

    $response = [
        'message' => $message,
        'count'   => is_array($result) ? count($result) : null,
        'result'    => $result,
        'errors'    => $errors
    ];

    // Remove null values from the response
    $response = array_filter($response, function ($value) {
        return !is_null($value);
    });

    return response()->json($response, $code);
}
