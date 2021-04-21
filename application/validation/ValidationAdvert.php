<?php
namespace App\validation;

/**
 * Здесь только валидируем наше объявление
 */
class ValidationAdvert extends ValidationBase  {

    public function check(array $params): array {

        return  $this-> checkRule($params, self::rule());
    }

    public static  function rule(){
        
            $rule = [
                    'title' => 'string',
                    'category' => 'integer',
                    'image' => 'file', 
                    'body'  =>'string'
                ];
        return $rule;
    }

}