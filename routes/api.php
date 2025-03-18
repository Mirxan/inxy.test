<?php

Route::group([
    'middleware' => 'api',
    "namespace" => "App\Http\Controllers",
], function ($router) {
    $router->controller(TransferController::class)
        ->prefix('transfer')
        ->group(function ($router) {
            $router->post('/', 'transfer')->middleware('transaction');
        });

    $router->controller(UserController::class)
        ->prefix('users')
        ->group(function ($router) {
            $router->patch('{id}/deposit', 'deposit')->middleware('transaction');
            $router->put('{id}', 'update');
        });
});

