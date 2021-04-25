<?php

namespace App\services;


interface EmailServiceInterface
{
    /**
     * куда отправляем
     * @param $email - почта
     */
    public function emailTo($email):self;
    /**
     * Добавляем заголовок
     * @param $subject - заголовок
     */
    public function subject($subject):self;
    /**
     * Добавляем тело письма
     * @param $body - тело письма
     */
    public function body($body) :self;
    /**
     * Выполняем отправку
     */
    public function send(): bool;
}
