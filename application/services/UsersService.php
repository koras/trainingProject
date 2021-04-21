<?php
namespace App\services;

use App\services\UsersServiceInterface;

use App\repositories\Users;
 


class UsersService implements UsersServiceInterface {


    private $storageUser;
 

    public function __construct() {
        
        //  это локальная переменная которая принадлежит классу
        $this->storageUser =  new Users();
 
     }

         /**
     * Создание нового пользователя
     */
    public function create(array $params)
    {


    }

    /**
     *  проверка логина и пароля
     */
    public function check($login,$pass) :bool
    {


    }

    /**
     * залогинен пользователь
     */
    public function  isAuth(): bool
    {


    }
}