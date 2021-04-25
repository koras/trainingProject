<?php
namespace App\controllers;

use  App\services\UsersService;

class BaseController {

    /**
     * наш шаблонизатор
     */
    protected $twigInit; 
    private $userService;
    public function __construct()
    {
        // все пользователи
       $this->userService =  new UsersService();
    }

    protected function view($template, $params = [])
    {
        // объект twig
        $this->twig(); 
        $params['isAuth'] =  $this->isAuth();
        echo  $this -> twigInit -> render($template, $params);
    }
 


    private function twig(){
        $dirTamplate = __DIR__.'.\..\templates';
        $dirCompilationCache = __DIR__.'.\..\compilation_cache';

        $loader = new \Twig\Loader\FilesystemLoader($dirTamplate);
        $this->twigInit = new \Twig\Environment($loader, [
            'cache' => $dirCompilationCache,
            'auto_reload' => true
        ]); 
    }

    protected function isAuth()
    {
        return $this->userService->isAuth();
    }


}
 