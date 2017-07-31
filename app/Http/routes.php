<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Get access_token
Route::post('oauth/access_token', function() {
     return Response::json(Authorizer::issueAccessToken());
});

//Create a test user, you don't need this if you already have.
Route::get('/register',function(){
    $user = new App\User();
     $user->name="tester";
     $user->email="test@test.com";
     $user->password = \Illuminate\Support\Facades\Hash::make("password");
     $user->save();
});

$api = app('Dingo\Api\Routing\Router');

//Show user info via restful service.
$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {

    //显示用户api
    $api->get('/users', 'UsersController@index');
    //添加用户api
    $api->post('/adduser','UsersController@addUser');
    //编辑用户api
    $api->post('/edituser','UsersController@editUser');
    //删除用户api
    $api->post('/deluser','UsersController@delUser');
    //查找用户api
    $api->get('/users/{id}', 'UsersController@show');

    //显示作品api
    $api->get('/works', 'WorksController@index');
    //添加作品api
    $api->post('/addworks','WorksController@addUser');
    //编辑作品api
    $api->post('/editworks','WorksController@editUser');
    //删除作品api
    $api->post('/delworks','WorksController@delUser');
    //查找作品api
    $api->get('/works/{id}', 'WorksController@show');
});
