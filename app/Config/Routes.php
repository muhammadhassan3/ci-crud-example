<?php

use App\Controllers\StockController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('stock', static function ($routes) {
    $routes->get('/', [StockController::class, 'index']);
    $routes->get('create', [StockController::class, 'create']);
    $routes->post('/', [StockController::class, 'insert']);
    $routes->get('(:num)', [StockController::class, 'edit']);
    $routes->put('(:num)', [StockController::class, 'update']);
    $routes->get('(:num)/confirm', [StockController::class, 'confirm']);
    $routes->delete('(:num)', [StockController::class, 'delete']);
});
