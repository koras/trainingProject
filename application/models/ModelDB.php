<?php

namespace App\models;

use App\models\ModelDBInterface;
use mysqli;

class ModelDB implements ModelDBInterface {

    /**
     * Наш коннект к базе
     */
    private $instance = null;

    /**
     * @var
     */
    private $query = [];


    public function __construct()
    {
        // все пользователи
        $this->_connetcDB();
    }

    /**
     * Мы коннектимся к базе
     */
    private function _connetcDB()
    {
      if($this->instance === null){ 
        $config = getConfig(); 
        $this->instance =  mysqli_connect(
                                      $config['server'],
                                      $config['user'],
                                      $config['pass'],
                                      $config['database'],
                                      $config['port']
                                      );
        if($this->instance == false)
        {
          echo 'не смогли получить доступ к базе';
        } 
      }
    }

     /**
      * 
      * @param array $params - что хотим получить
      */
      public function select($params)
      {
        $this->query['select'] = $params;
        return $this;
      }
 

     /**
      * Условия запроса
      * @param array $params - наши условия для запроса
      */
      public function where($params)
      {
         $this->query['where'] = $params;
         return $this;
      }

     /**
      * Условия запроса
      * @param array $params - наши условия для запроса
      */
      public function wherein($key, $params)
      {
         $this->query['in'] = $params;
         return $this;
      }


      /**
       * Условия запроса
       * @param array $params - наши условия для запроса
       */
      private function  _getTable()
      {
        return $this->table;   
      
      }

     /**
      * сколько элементов хотим получить
      * @param integer $start - от какого количества
      * @param integer $number - какое количество
      */
    public function limit($start, $number)
    {
     
      $this->query['limit'][] = $start;
      $this->query['limit'][] = $number;
        return $this;
    }

    /**
     * выполняем запрос
     */
    private function _execute($instance, $q)
    {
      $result =  mysqli_query($instance, $q);
      if($result == false)
      {
          print("произошла ошибка в запросе ". $q);
          die();
      }else{
        return $result;
      }
    }

    /**
     * Выполняем запрос
     */
    public function get()
     {
       $data = [];
        $result =  $this -> _execute($this->instance, $this->_getQuery());
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        } 
        return $data;
     }

    /**
     * Показать мой запрос
     */
    public function show()
     {
        echo $this->_getQuery();
       die(); 
     }

    /**
     * 
     */

     private function _getQuery() :string
     { 
      $q = "";
      foreach($this->query as $key => $qValue)
      {
        $q .= $key ." ";
        foreach($qValue as $qKey => $qVal)
        {
            if($key == "select"){
               $q .= "`$qVal`";
                if(count($qValue)-1 != $qKey)
                {
                  $q .= ", ";
                }else{
                  $q .= "  from `".$this->_getTable() ."` ";
                }
            }
            if($key == "where"){
                  $q .= " `$qKey` = $qVal ";
            }
            if($key == "limit"){
              if(count($qValue)-1 != $qKey)
              {
                $q .= "$qVal, ";
              }else{
                $q .= "$qVal";
              }
            }
        } 
      }
      return $q ." ;";
     }


     /**
      * Здесь мы будем создавать новые записи
      * @param array $data - ключ = значение
      * @return int - уникальный ID
      */
     public function create($data)
     {  
       // формируем наш запрос
        $query = $this-> _prepareCreateQuery($data);
        // выпролняем наш запрос
        $this -> _execute($this->instance, $query);
        // получаем последний id
        return   mysqli_insert_id($this->instance);
     }


     private function _prepareCreateQuery($data)
     {
      $table = $this->_getTable();
      $q = "insert into {$table} set ";

      $dataBD = [];
      $fill = $this->fill;
      foreach($fill as $value)
      {
        if(isset($data[$value])){ 
           $dataBD[$value] = $data[$value];
        }
      }

      $numCollumn = 0;
      foreach( $dataBD as $column => $value)
      {
        $numCollumn++; 
        $q .= " `$column` =   \"{$value}\" ";
        
        if(count( $dataBD) != $numCollumn)
        {
            $q .= ", ";
        }
        
      }
      return $q;
     }


}