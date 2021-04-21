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
       // наша логика ещё к родительской
        $this->usersService = new UsersService();
        $this->validationAdvert = new ValidationAdvert();
    } 


  

    /**
     * @param array $params - наш $_GET | $_POST для общей передачи параметров
     */
    public function viewOrCreate(array $params = [])
    {
        echo 'viewOrCreate';
        die();

    
        // $this->advertService-> getShow(2);

        // $result = [];
        // // S.O.L.I.D.
        // // проверяем данные пользователя
        // $result['error'] = $this->validationAdvert->check($params);

        // if(count($params) > 3 && count($result['error']) == 0 ){
        //     // записываем наше объявление
        //     $params['file'] = $_FILES['imageAdvert'];  
             
        //     $result['advert'] = $this -> advertService -> createAdvert($params);
        // // обрабатываем данные которые прислал пользователь в форме   
        //   //  echo 'мы добавили объявление';
        //     header( 'Location: /' );
        // }
        
        // $result['title_header'] = "Добавляем объявление";
        // $template = 'adverts/add.html';
        // $this -> view($template, $result);
    }

 

}
