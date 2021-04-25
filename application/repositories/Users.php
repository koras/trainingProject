<?php
namespace App\repositories;

use App\models\ModelDB;

class Users extends ModelDB implements UsersInterface {


    public $table = "users";
 
    public $fill = ['name','email','status','phone','address','password','create_up', 'role'];

    public function getOne($id)
    {
      $result = $this   -> select(['name','email','status','phone','address', 'role'])
                   //     -> wherein('id',[2,3,6])
                        -> where(['id' => $id])
                     //   -> limit(1,2)
                     //   -> show();
                        -> get();
       return $result;
    }

    /**
     * Проверка пароля и емайла
     * @param $email - почтовый адресс
     * @param $password - наш пароль
     * @return bool|array
     */
    public function checkAuth($email, $password){

        $query = "select id, name, email from {$this->table} where `email`= \"$email\" and `password`=\"$password\"";
        $result = $this->rawSelect($query);
        
        if(isset($result['0']['id'])){
            return $result['0'];
        }
        return false;
    }


    public function getList()
    {
        return $this -> select(['id','name','email','status','phone','address'])
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
 

}