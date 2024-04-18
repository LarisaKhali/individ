<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;

class Site
{
    public function hello()
    {
        return (new View())->render('site.hello',['message' => 'welcome to site!']);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())) {
            echo 'Пользователь успешно зарегистрирован!';
        }
        return (new View())->render('site.signup');
    }

    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }


}