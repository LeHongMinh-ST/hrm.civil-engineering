<?php
declare(strict_types=1);

namespace App\Trait;


use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseTrait
 * @package App\Traits
 */
trait ResponseTrait
{
    /**
     * @param $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function responseSuccess($data = null, string $message = 'success', int $code = 200): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * @param string $message
     * @param array $data
     * @param int $httpStatusCode
     * @param int $code
     * @return JsonResponse
     */
    public function responseError(string $message = 'error', array $data = [], int $httpStatusCode = 500, int $code = 500): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'error' => $data,
        ], $httpStatusCode);
    }
}
