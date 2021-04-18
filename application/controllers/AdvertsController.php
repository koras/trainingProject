<?php

namespace App\controllers;

//use App\controllers\BaseController;
use App\services\AdvertService;

use App\validation\ValidationAdvert;

 

class AdvertsController  extends BaseController {

    private $advertService;
    private $validationAdvert;

    public function __construct()
    {

        // только зарегистрированные пользователи
    // проверяем зарегистрирован или нет и показываем профиль
    // вызываем конструктор родителя
       parent::__construct();
       // наша логика ещё к родительской
        $this->advertService = new AdvertService();
        $this->validationAdvert = new ValidationAdvert();
    } 


    public function eventSave($request)
    {

    }

    /**
     * Получаем данные для редактирования в шаблоне
     * и отдаём пользователю
     */
    public function eventGetForEdit($request)
    {
         $advert =  $this -> advertService ->getAdvert($request);
         $template = 'adverts/edit.html';
         $this->view($template, $advert);
    }
    

    public function eventShow($request)
    {
     //   $id = isset($request['id'])?$request['id']:0;
        $id = isset($request['id'])??0;
        $data = AdvertService::getInstance();
        $params = ['dataAdverts'=> $data, 'user'=> 'Kolia','address'=> 'Lenin 1'];
        $template = 'adverts/index.html';
        $this->view($template, $params);
    }

    /**
     * @param array $params - наш $_GET | $_POST для общей передачи параметров
     */
    public function eventAdd(array $params = [])
    {
    
        $this->advertService-> getShow(2);

        $result = [];
        // S.O.L.I.D.
        // проверяем данные пользователя
        $result['error'] = $this->validationAdvert->check($params);

        if(count($params) > 3 && count($result['error']) == 0 ){
            // записываем наше объявление
            $params['file'] = $_FILES['imageAdvert'];
            $result['advert'] = $this -> advertService -> createAdvert($params);
        // обрабатываем данные которые прислал пользователь в форме   
          //  echo 'мы добавили объявление';
            header( 'Location: /' );
        }
        
        $result['title_header'] = "Добавляем объявление";
        $template = 'adverts/add.html';
        $this -> view($template, $result);
    }



    
    public function eventList($request)
    {

    }

    public function eventDefault()
    { 
        // получаем все объявления
        // вызываем сервисный
        $adverts = $this->advertService->getAdvert([]);
        $template = 'adverts/index.html';
        $this->view($template, ['dataAdverts'=> $adverts ]);
    }
    

}
