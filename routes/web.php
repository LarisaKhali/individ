<?php

use Src\Route;

Route::add('hello', [Controller\Site::class, 'hello']);
Route::add('login', [Controller\Site::class, 'login']);
Route::add('logout', [Controller\Site::class, 'logout']);
Route::add('signup', [Controller\Site::class, 'signup']);