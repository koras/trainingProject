<?php

namespace App\models;

/**
 * Интерфейс реализации для работы с базой данных
 */
interface ModelDBInterface {

    
     /**
      * 
      * @param array $params - что хотим получить
      */
      public function select($params);

     /**
      * Условия запроса
      * @param array $params - наши условия для запроса
      */
     public function where($params);

     /**
      * сколько элементов хотим получить
      * @param integer $start - от какого количества
      * @param integer $number - какое количество
      */
    public function limit($start, $number);

    /**
     * Выполняем запрос
     */
   public function get();


    /**
    * Здесь мы будем создавать новые записи
    * @param array $data - ключ = значение
    * @return int - уникальный ID
    */
    public function create($data);


}