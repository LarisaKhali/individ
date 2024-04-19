<?php

use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'hello']);

Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/profile', [Controller\Site::class, 'profile']);
Route::add(['GET', 'POST'], '/workspace', [Controller\Site::class, 'workspace']);
Route::add(['GET', 'POST'], '/room', [Controller\Site::class, 'room']);