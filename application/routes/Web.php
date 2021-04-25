<?php

namespace App\routes;

use App\controllers\AdvertsController;
use App\controllers\SearchController;
use App\controllers\UsersController;

class Web {
    private $controllersAdvert;
    private $controllersSearch;
    private $controllersUsers;

    function __construct()
    {
        $this->controllersAdvert = new AdvertsController();
        $this->controllersSearch = new SearchController();
        $this->controllersUsers = new UsersController();
    }
    //$_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']

    /**
     * 
     * @param string $method - переменная $_SERVER с ключём REQUEST_METHOD
     * @param string $url переменная $_SERVER с ключём REQUEST_URI
     * @return void|string|null|array|object
     * 
     */
    public function callController($method, $url)
    {
        $url = self::clearUrl($url);
        if($method == "POST"){ 
            return  $this -> methodPOST($url);
        }else if($method == "GET"){
            return $this -> methodGet($url);
        }
    }

    private static function clearUrl($url)
    {
       preg_match('/^\/([0-9a-zA-Z\/]+)/',$url,$result);
        if(isset($result['1'])){
            return $result['1'];
        }
        return '';
    }
    /**
     * Обрабатываем только GET параметры
     * 
     */
    private function methodGet($url)
    { 
     
        switch($url){
            // объявления
            case 'user/checkEmail':
                {
                 return  $this->controllersUsers->checkEmail($_GET);
                }
            break;

            case 'user/logout':{
                return  $this->controllersUsers->logout();
             }
            break;

            case 'show':{ 
               return $this->controllersAdvert->eventShow($_GET);
            }
            break;
            // добавить объявление
            case 'advert/add':{
                return $this->controllersAdvert->eventAdd($_GET);
             }
            case 'search':{
            //поиск объявлени
               return $this->controllersSearch->eventSearch($_GET);
            }
            break;
            case 'list':{
               return $this->controllersAdvert->eventList($_GET);
            }
            break;
            case "advert/edit":{
                // мы передаём id в $_GET
                return $this->controllersAdvert->eventGetForEdit($_GET);
            }
            break;

            case 'save':{
               return $this->controllersAdvert->eventSave($_POST);
            }
            break;
            case 'user/create':{
               return  $this->controllersUsers->viewOrCreate();
            }
            break;
            case 'user/login':{
               return  $this->controllersUsers->login();
            }
            break;

             


            default: 
            return $this->controllersAdvert->eventDefault();
         }
    }
    private function methodPOST($url)
    {
        switch($url){
            case 'search':{
               return $this->controllersSearch->eventSearch($_POST);
            }
            break;
            case 'advert/add':{ 
               return $this->controllersAdvert->eventAdd($_POST);
            }
            case 'user/create':{  
               return  $this->controllersUsers->viewOrCreate($_POST);
            }
            break;
            case 'user/login':{
                return  $this->controllersUsers->login($_POST);
             }
             break;
         }
    }
}