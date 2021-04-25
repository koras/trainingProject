<?php

namespace App\controllers;

//use App\controllers\BaseController;
use App\services\UsersService;

use App\validation\ValidationAdvert;

 

class UsersController  extends BaseController {

    private $usersService;
    private $validationAdvert;

    public function __construct()
    {

        // только зарегистрированные пользователи
    // проверяем зарегистрирован или нет и показываем профиль
    // вызываем конструктор родителя
       parent::__construct();
       session_start();
       // наша логика ещё к родительской
      $this->usersService = new UsersService();
      //  $this->validationAdvert = new ValidationAdvert();
    } 

    /**
     * Проверка почты 
     */
    public function checkEmail($params)
    {   
         
        if(isset($params['email']) && isset($params['hash']))
        {
          //  echo "<pre>";
            $email = $params['email'];
            $hash = $params['hash'];
   
            $result = $this->usersService->checkEmailService($hash, $email);
            if($result)
            {
                echo "Email $email подтверждён";
            }else{
                echo 'Хэш $email не найден';
            }
        }else{
            echo 'hash not found';
        }
    }

    /**
     * Пользователь разлогинился
     */
    public function logout()
    {
        
        $this->usersService -> logout();
        header( 'Location: /' );
    }

    public static function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @param array $params - наш $_GET | $_POST для общей передачи параметров
     */
    public function viewOrCreate(array $params = [])
    {
        if(count($params) > 3){
         
            $this->usersService->create($params);

            header( 'Location: /' );
        return;
        }

        $template = 'user/registration.html';
        $result['title_header'] = "Регистрация пользователя";
        $result['name'] = self::generateRandomString(10);
        $result['phone'] = "7(925)".rand(100,900)."-".rand(10,99)."-".rand(10,99);
        $result['email'] = self::generateRandomString(10)."@".self::generateRandomString(10).'.ru';
        $result['address'] = self::generateRandomString(10)." дом ".rand(10,99);
        $result['pass'] = "123456789";
        $result['re-pass'] = "123456789"; 
         
        $this -> view($template, $result);
    }


    public function login(array $params = [])
    {
       
        // проверяем в системе пользователь или нет
        if(!$this->usersService->isAuth()){ 
            $template = 'user/login.html';
            $result['title'] = "авторизация пользователя";

            if(isset($params['email']) && isset($params['pass']))
            {
            $result =   $this->usersService->login($params['email'],$params['pass']);
                // прислал параметры авторизации
                if( $result){
                    return header( 'Location: /' );
                }else{
                    $result['error'] = "Ошибка авторизации";
                } 
            }
          return  $this -> view($template, $result);
        }

        header( 'Location: /' );
    }
 

}
