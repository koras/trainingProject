<?php
namespace App\repositories;

use App\models\ModelDB;

class Adverts extends ModelDB implements AdvertsInterface {


    public $table = "adverts";

    public $fill = ['cost','category','title','body','address','img'];



    
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
        return $this -> select(['id','cost','category','title','body','address','img'])
             -> where(['status' => 1])
             -> get();
    }
 

    
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

    
    public function hide($id)
    {
        
    }

}