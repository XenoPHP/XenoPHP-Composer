<?php

namespace Core\Http\Controllers\Api;

use Core\Traits\ApiResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class VersionController extends BaseController
{
    use ApiResponse;

    /**
     * Get the framework version.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success([
            'framework' => 'XenoPHP Framework',
            'version' => '1.0.0 beta version', // Match the version from Core/Application.php
        ], 'Version retrieved successfully.');
    }
}
