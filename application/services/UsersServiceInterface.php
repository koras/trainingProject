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
  //  public function check($login,$pass) :bool ; 

    /**
     * проверяем логин пароль и возвращаем результат проверки
     */
    public function login($email, $pass) : bool;


    /**
     * залогинен пользователь
     */
    public static function isAuth(): bool;
 

}