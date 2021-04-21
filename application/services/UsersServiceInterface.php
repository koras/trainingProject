<?php

namespace App\services;

interface UsersServiceInterface 
{
    /**
     * Создание нового пользователя
     */
    public function create(array $params);

    /**
     *  проверка логина и пароля
     */
    public function check($login,$pass) :bool ; 

    /**
     * залогинен пользователь
     */
    public function  isAuth(): bool ;
}