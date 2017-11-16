<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Issue;

class SwaggerApiController extends Controller
{
    public function swag()
    {
        $swagger = \Kevupton\LaravelSwagger\scan(app_path('/'), [
            'models' => [
                /** All models go in here */
                User::class,
                Issue::class,
            ]
        ]);

        return response($swagger,200);
    }
}
