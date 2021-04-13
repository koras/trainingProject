<?php
namespace App\repositories;

use App\models\ModelDB;

class Adverts extends ModelDB implements AdvertsInterface {


    public $table = "adverts";

    
    public function getOne($id)
    {

    }

    public function getList()
    {
        
    }

    
    public function saveOrUpdate(array $params): array 
    {
        
        
        return [];
    }

    
    public function hide($id)
    {
        
    }

}