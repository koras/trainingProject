<?php

namespace App\services;


// S.O.L.I.D

interface ImageInterface 
{
    public function add($image);
}

interface ImageResizeInterface 
{    
    /**
    * @param $images - наша картинка
    * @param $params - параметры обрезания
    */
   public function resize($image,$params);
}


class ImageService implements  ImageInterface, ImageResizeInterface  {


    private $path = 'img/';

    public function add($image)
    {
        $tmpName = $image['tmp_name'];
        $name = $image['name'];
        $randName = $this->getRandName($name);
        $newName = $randName . '.jpg'; 
        $tmpName = $this-> resize($tmpName, ['w'=>100,'w'=>80]);
        $this->saveFile($tmpName, $newName);
        return $newName;
 
    }

    /**
     * Записываем нашу картинку
     * 
     */
    private function saveFile($tmpName, $name = "")
    {
        move_uploaded_file($tmpName, $this->path.$name );
    }
    /**
     *генерируем имя
     */
    private function  getRandName($name)
    {
        return md5($name . rand(1,1000000));
    }

    /**
     * @param $images - наша картинка
     * @param $params - параметры обрезания
     */
    public function resize($image,$params)
    {
        return $image;
    }

}