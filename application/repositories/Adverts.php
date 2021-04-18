<?php
namespace App\repositories;

use App\models\ModelDB;

class Adverts extends ModelDB implements AdvertsInterface {


    public $table = "adverts";

    
    public function getOne($id)
    {
      $result = $this   -> select(['id','title','body'])
                   //     -> wherein('id',[2,3,6])
                        -> where(['id' => 1])
                     //   -> limit(1,2)
                     //   -> show();
                        -> get();


       return $result;
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