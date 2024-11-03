<?php

/**
 * Pattern for the response to be given in API requests
 *
 * @param int $resultType [0 = Success, 1 = Error, 2 = Logout, 3 = Update, 4 = Refresh]
 * @param int $errorType [0 = Success, 1 = Error, 2 = Warning, 3 = Info]
 * @param int $responseCode
 * @param string $message
 * @param array $data [Object]
 *
 * @return mixed
 */
function generateApiMessage(int $resultType, int $errorType, int $responseCode ,string $errorMessage = "", $data = null)
{
    return response()->json([
        'resultType'    => $resultType,
        'errorType'     => $errorType,
        'message'       => $errorMessage,
        'data'          => $data
    ], $responseCode);
}