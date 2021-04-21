<?php

namespace App\routes;

use App\controllers\AdvertsController;
use App\controllers\SearchController;
use App\controllers\UsersController;

class Web {
    private $classAdvert;
    private $classSearch;
    private $classUsers;

    function __construct()
    {
        $this->classAdvert = new AdvertsController();
        $this->classSearch = new SearchController();
        $this->classUsers = new UsersController();
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
            case 'show':{ 
               return $this->classAdvert->eventShow($_GET);
            }
            break;
            // добавить объявление
            case 'advert/add':{
                return $this->classAdvert->eventAdd($_GET);
             }
            case 'search':{
            //поиск объявлени
               return $this->classSearch->eventSearch($_GET);
            }
            break;
            case 'list':{
               return $this->classAdvert->eventList($_GET);
            }
            break;
            case "advert/edit":{
                // мы передаём id в $_GET
                return $this->classAdvert->eventGetForEdit($_GET);
            }
            break;

            case 'save':{
               return $this->classAdvert->eventSave($_POST);
            }

            case 'user/create':{
               return  $this->classUsers->viewOrCreate();
            }

            break;

            default: 
            return $this->classAdvert->eventDefault();
         }
    }
    private function methodPOST($url)
    {
        switch($url){
            case 'search':{
               return $this->classSearch->eventSearch($_POST);
            }
            break;
            case 'advert/add':{ 
               return $this->classAdvert->eventAdd($_POST);
            }
            case 'user/create':{  
               return  $this->classUsers->viewOrCreate($_POST);
            }
            break;
         }
    }
}