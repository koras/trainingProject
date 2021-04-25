<?php 

namespace App\repositories;

interface UsersInterface {

    /**
     * Проверка пароля и емайла
     * @param $email - почтовый адресс
     * @param $password - наш пароль
     * 
     * @return bool
     */
    public function checkAuth($email, $password);
    

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