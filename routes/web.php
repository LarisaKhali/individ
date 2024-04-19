<?php

use Src\Route;

Route::add('', [Controller\Site::class, 'hello']);
Route::add('login', [Controller\Site::class, 'login']);
Route::add('logout', [Controller\Site::class, 'logout']);
Route::add('profile', [Controller\Site::class, 'profile']);
Route::add('admin', [Controller\Site::class, 'admin']);