<?php

namespace App\Middleware;

use App\Responses\Response;

class AuthMiddleware
{
    public function handle(): bool
    {
        // Temporary authentication

        if (!isset($_GET['token']) || empty(($_GET['token']))) {

            Response::json([
                'success' => false,
                'message' => 'Unauthorized'
            ],401);

            return false;
        }

        return true;
    }
}