<?php

function generateResponse(int $resultType, int $errorType, int $responseCode ,string $errorMessage = "", $data = null)
{
    return response()->json([
        'resultType'    => $resultType,
        'errorType'     => $errorType,
        'message'       => $errorMessage,
        'data'          => $data
    ], $responseCode);
}
