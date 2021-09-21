<?php

if (!function_exists('sendResponse')) {

    /**
     * @param $result
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function sendResponse($result, $message = "", $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }
}

if (!function_exists('sendError')) {

    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
