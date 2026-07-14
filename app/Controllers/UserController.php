<?php

namespace App\Controllers;

use App\Responses\Response;

class UserController
{
    public function index()
    {
        Response::json([
            'status' => true,
            'message' => 'User index endpoint'
        ], 200);
    }

    public function store(): void
    {
        Response::json([
            'success'=>true,
            'message'=>'User Created',
            'data'=>[]
        ]);
    }

    public function update(): void
    {
        Response::json([
            'success'=>true,
            'message'=>'User Updated',
            'data'=>[]
        ]);
    }

    public function destroy(): void
    {
        Response::json([
            'success'=>true,
            'message'=>'User Deleted',
            'data'=>[]
        ]);
    }
}