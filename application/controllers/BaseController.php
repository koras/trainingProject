<?php
namespace App\controllers;


class BaseController {

    /**
     * наш шаблонизатор
     */
    protected $twigInit;

    public function __construct()
    {
        // все пользователи
    }

    protected function view($template, $params = [])
    {
        $this->twig();
        // объект twig
        echo  $this->twigInit->render($template, $params);
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

}
 