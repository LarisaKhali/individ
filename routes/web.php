<?php

use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'hello']);

Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/profile', [Controller\Site::class, 'profile']);
Route::add(['GET', 'POST'], '/workspace_admin', [Controller\Site::class, 'workspace_admin']);
Route::add(['GET', 'POST'], '/workspace_worker', [Controller\Site::class, 'workspace_worker']);
Route::add(['GET', 'POST'], '/room/{build_id}', [Controller\Site::class, 'room']);