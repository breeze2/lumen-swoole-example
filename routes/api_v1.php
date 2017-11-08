<?php

$router->group(['prefix' => '/test'], function ($api) {
    $api->get('/static', 'TestController@getStatic');
    $api->get('/read', 'TestController@getRead');
    $api->get('/write', 'TestController@getWrite');

    $api->get('/t', ['middleware' => 'api.throttle', 'limit' => 2, 'expires' => 1, function () {
        echo app()->version();
    }]);
});

$router->group(['prefix' => '/auth'], function ($api) {
    $api->post('/login', 'AuthController@postLogin');
    $api->post('/register', 'AuthController@postRegister');
    $api->post('/refresh', 'AuthController@postRefresh');
});

$router->group(['prefix' => '/user', 'middleware' => 'api.auth'], function ($api) {
    $api->get('/info', 'UserController@getInfo');
});
