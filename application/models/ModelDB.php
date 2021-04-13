<?php

namespace App\models;

use App\models\ModelDBInterface;

class ModelDB implements ModelDBInterface {

    /**
     * Наш коннект к базе
     */
    private $instance;

    public function __construct()
    {
        // все пользователи
        self::_connetcDB();
    }

    /**
     * Мы коннектимся к базе
     */
    private static function _connetcDB()
    {

    }

     /**
      * 
      * @param array $params - что хотим получить
      */
      public function select($params)
      {
          
        return $this;
      }
 

     /**
      * Условия запроса
      * @param array $params - наши условия для запроса
      */
     public function where($params)
     {

        return $this;
     }

     /**
      * сколько элементов хотим получить
      * @param integer $start - от какого количества
      * @param integer $number - какое количество
      */
    public function limit($start, $number)
    {
     
        return $this;
    }


    /**
     * Выполняем запрос
     */
    public function get()
     {

        return $this;
     }
}