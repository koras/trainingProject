<?php 

namespace App\repositories;

interface UsersInterface {

    /**
     * Получаем одного пользователя
     * 
     */
    public function getOne($id);
    
    /**
     * Получаем список пользователей
     * 
     */
    public function getList();

    /**
     * Обновляем или создаём нового пользователя
     * @param array $params
     * @return array 
     */
    public function saveOrUpdate(array $params);

}