<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('sendResponse')) {

    /**
     * Custom sendResponse
     *
     * @param $result
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    function sendResponse($result, $message = "", $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        if (empty($result)) {
            unset($response['data']);
        }

        return response()->json($response, $code);
    }
}

if (!function_exists('sendError')) {

    /**
     * Custom sendError
     *
     * @param $error
     * @param $errorMessages
     * @param int $code
     * @return JsonResponse
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

if (!function_exists('destroy')) {

    /**
     * Destroy helper
     *
     * @param $model
     * @param $message
     * @return JsonResponse
     */
    function destroy($model, $message)
    {
        try {

            DB::transaction(function () use ($model) {
                $model->delete();
            });

        } catch (\Throwable $e) {
            return sendError($e->getMessage());
        }

        return sendResponse(null, $message . ' eliminado correctamente.');
    }
}

