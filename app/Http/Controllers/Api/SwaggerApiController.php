<?php

namespace App\Http\Controllers\Api;

use App\IssueConversations;
use App\Role;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Issue;

class SwaggerApiController extends Controller
{
    /**
     * @SWG\Swagger(
     *     host="localhost:80",
     *     basePath="/api",
     *     schemes={"http"},
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="laravel Api",
     *         description="This is a Laravel Api generated by Jeffrey Lim",
     *         termsOfService="http://jeffreylim.me",
     *         @SWG\Contact(email="jeffrey_lim5@hotmail.com"),
     *         @SWG\License(name="jeffrey", url="http://jeffreylim.me")
     *     ),
     *     @SWG\ExternalDocumentation(
     *       description="find out more in this url below",
     *       url="http://jeffreylim.me",
     *     )
     *
     * )
     */

    public function swag()
    {

        $types = ['enum' => 'string'];
        $platform = DB::getDoctrineConnection()->getDatabasePlatform();
        foreach ($types as $type_key => $type_value) {
            if (!$platform->hasDoctrineTypeMappingFor($type_key)) {
                $platform->registerDoctrineTypeMapping($type_key, $type_value);
            }
        }

        $swagger = \Kevupton\LaravelSwagger\scan(app_path('/'), [
            'models' => [
                /** All models go in here */
                User::class,
                Issue::class,
                IssueConversations::class,
                Role::class,
            ]
        ]);

        return response($swagger, 200);
    }
}
