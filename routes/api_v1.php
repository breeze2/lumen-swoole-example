<?php

$router->get('/test', 'TestController@index');
$router->get('/t', ['middleware' => 'api.throttle', 'limit' => 2, 'expires' => 1, function () {
    echo 1;
}]);

$router->group(['prefix' => '/auth'], function ($api) {
    $api->post('/login', 'AuthController@postLogin');
    $api->post('/register', 'AuthController@postRegister');
    $api->post('/refresh', 'AuthController@postRefresh');
});

$router->group(['prefix' => '/user', 'middleware' => 'api.auth'], function ($api) {
    $api->get('/info', 'UserController@getInfo');
});
