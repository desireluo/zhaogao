<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', function () {
    return '';
});
//Router::get('/hello-hyperf', function () {
//    return 'Hello Hyperf.';
//});

Router::addRoute(['GET', 'HEAD'], '/hello-hyperf', 'App\Controller\IndexController::hello');
Router::get('/user-list', 'App\Controller\UserController::index');
Router::addRoute(['GET', 'POST'], '/user/{id:\d+}', 'App\Controller\UserController::info');
Router::delete('/user/{id:\d+}', 'App\Controller\UserController::deleteUser');

