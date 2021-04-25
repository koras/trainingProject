<?php

namespace App\repositories;


use App\models\ModelDB;

class EmailStorage extends ModelDB 
{
    
    protected $table = 'email';

    
    public $fill = ['email','user_id','datetime','hash','status'];
   
 

    /**
     * Получаем поле и почту по хэшу
     * 
     */
    public function getOne($hash, $email)
    {
        
        $result = $this   -> select(['id'])
        //  -> where(['hash' => $hash, 'email' =>$email])
             -> where(['hash' => $hash])
             -> get(); 
        return $result; 
    }
    
    /**
     * статус
     * 
     */
    public function updateStatus($id, $status)
    { 
        $query = "update {$this->table} SET `status` = \"{$status}\" where `id` = \"{$id}\";";
        $this -> rawInsert($query);
        return true;
    }

    /**
     * 
     * @param array $params
     * @return array 
     */
    public function saveOrUpdate(array $params)
    {
        if(isset($params['id'])){
            // обновляем
           $id = $params['id'];
        }else{
            // создаём новую запись
           $id =  $this->create($params);
        }
        return $id;
    }
}
