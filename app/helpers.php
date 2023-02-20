<?php




if (!function_exists('sendJsonResponse')) {
    /**
     * @param $result
     * @param $message
     */
    function sendJsonResponse($result, $message = '')
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }
}

if (!function_exists('sendJsonError')) {
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    function sendJsonError($errorMessages, $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
            'data'    => null,
        ];

        return response()->json($response, $code);
    }
}


