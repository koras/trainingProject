<?php 

namespace App\validation;

class ValidationBase implements ValidationIntarface {


    public function check(array $params): array {

        return [];
    }



    public function checkRule(array $params, array $rules): array {
        foreach($rules as $key => $rule){
            //echo $key , $rule;
            $this->{$rule.'Check'}($key);
        }
        return [];
    }


    private function stringCheck($val){
 
        if(isset($_GET[$val])){
            // проверить
        }elseif(isset($_GET[$val])){

        }else{
            return ['error'=>"params $val nof found"];
        }
        
    }

    private function integerCheck($val){

    }
    private function fileCheck($val){

    }

}