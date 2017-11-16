<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Api\RegisterController@create');

Route::group(['middleware' => ['auth:api']], function () {

    #issues - no relationship
    Route::resource('issues', 'Api\IssuesController', ['only' => ['index', 'store', 'update', 'destroy']]);

    #issues conversations - has many, belongs to
    Route::resource('issues.conversations', 'Api\IssueConversationsController', ['only' => ['index', 'store', 'destroy', 'update']]);

    #user roles - belongs to many
    Route::resource('users.roles', 'Api\UserRolesController', ['only' => ['index', 'destroy', 'store','update']]);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




