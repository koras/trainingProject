<?php

namespace App\services;
 
class EmailService implements EmailServiceInterface {
    /**
     * @val - куда отправляем
     */
    private $to = null;
    /**
     * @val - тема письма 
     */
    private $subject = null;
    /**
     * @val - тело письма
     */
    private $body = null;

    /**
     * куда отправляем
     * @param $email - почта
     */
    public function emailTo($email):self
    {
        $this->to = $email;
        return $this;
    }

    /**
     * Добавляем заголовок
     * @param $subject - заголовок
     */
    public function subject($subject):self
    {
        $this->subject = $subject;
        return $this;
    }
    /**
     * Добавляем тело письма
     * @param $body - тело письма
     */
    public function body($body):self
    {
        $this->body = $body;
        return $this;
    }
    /**
     * Выполняем отправку
     */
    public function send():bool
    {
        if($this->_check()){ 
            // логировать
            return mail($this->to,$this->subject,$this->body);
        }
        return false;
    }
    /**
     * Выполняем отправку
     */
    public function _check():bool
    {
         if(!is_null($this->to) && !is_null($this->body) && !is_null($this->subject))
         {
             return true;
         }
         echo 'письмо заполнено некоректно';
         return false;
    }

}
