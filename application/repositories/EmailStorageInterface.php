<?php

namespace App\repositories;


interface EmailStorageInterface {
    
    /**
     * Получаем email
     * 
     */
    public function getOne($hash, $email);
    
    /**
     * статус
     * 
     */
    public function updateStatus($id, $status);

    /**
     * Обновляем  
     * @param array $params
     * @return array 
     */
    public function saveOrUpdate(array $params);

}