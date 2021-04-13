<?php
namespace App\validation;

interface ValidationIntarface {

    public function check(array  $params): array ;

}