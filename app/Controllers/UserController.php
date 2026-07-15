<?php

namespace App\Controllers;

use App\Core\Request;
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

    public function store(Request $request): void
    {
        Response::json([
            'success'=>true,
            'message'=>'User Created',
            'data'=>$request->all()
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