<?php 

namespace App\repositories;

interface AdvertsInterface {

    /**
     * Получаем одно объявление
     * 
     */
    public function getOne($id);
    
    /**
     * Получаем список объявлени
     * 
     */
    public function getList();

    /**
     * Обновляем или создаём новое объявление
     * @param array $params
     * @return array 
     */
    public function saveOrUpdate(array $params);

    /**
     * скрываем объявление
     * @param integer id
     */
    public function hide($id);

    
}