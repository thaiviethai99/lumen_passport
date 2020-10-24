<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/demo/{id}','DemoController@demo');
$app->post('insert','DemoController@insert');
$app->post('/register','UsersController@register');

$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('/', function () use ($app) {
        return "API is working.";
    });

    $app->group(['middleware' => 'auth'], function () use ($app) {
        $app->get('/testapi', 'DemoController@testapi');
    });
});

