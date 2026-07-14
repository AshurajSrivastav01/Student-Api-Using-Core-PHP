<?php

namespace App\Controllers;

use App\Responses\Response;

class UserController
{
    public function index()
    {
        Response::json([
            'message' => 'User index endpoint',
            'status' => 'success'
        ], 200);
    }
}