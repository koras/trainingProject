<?php
namespace App\services;

use App\services\UsersServiceInterface;

use App\repositories\Users;
use App\repositories\EmailStorage;
 


class UsersService implements UsersServiceInterface {

    /**
     * Репозитории
     */
    private $storageUser, $storageEmail;
    
    private $emailService;

    const SOLT = "open";

    public function __construct() {
        
        //  это локальная переменная которая принадлежит классу
        $this->storageUser =  new Users();
        $this->storageEmail = new EmailStorage();
        $this->emailService = new EmailService();
 
     }

     public function checkEmailService($hash, $email)
     {
         $result = $this->storageEmail-> getOne($hash, $email);

         if(isset($result[0]['id']))
         {
            $id = $result[0]['id'];
            // меняем статус у почты что пользователь её подтвердил
              $this->storageEmail->updateStatus($id,1);
              
            return true;
         //    echo "проверка пройдена ";
         }else{
             return false;
         }

     }

     

    /**
     * Создание нового пользователя
     */
    public function create(array $params)
    {
        // генерируем хэш на основе пароля
       $params['password'] = static::_hashPassword($params['password']);
       $params['status'] = 0;
        // сохраняем информацию по пользователю
       $user_id =  $this->storageUser -> saveOrUpdate($params);
       $params['user_id'] = $user_id;
        // добавляем в базу информацию по почте
       $this->_emailAddStorage($params);

       
       $_SESSION['id'] = $user_id;

      
    }
    /**
     * Подготавливаем и добавляем данные в базу данных
     */
    private function _emailAddStorage($params)
    {
        //  ['email','user_id','datetime','hash','status'];
        $data = [];
        $rand = rand(1,1111111);
        $data['hash'] = $this->_hashPassword($rand);
        $data['email'] = $params['email'];
        $data['user_id'] = $params['user_id'];

            //'2021-04-24 19:00:02'
        //@url https://www.php.net/manual/ru/datetime.format.php
        $data['datetime'] = date('Y-m-d H:i:s');

        
        $data['status'] = 0;
        $this->storageEmail ->saveOrUpdate($data);

        $this -> _sendEmail($data['user_id'],$data['email'], $data['hash']);
    }
    /**
     * отправляем почту
     * @url https://www.php.net/manual/ru/function.mail.php
     */
    private function _sendEmail($user_id,$email, $hash)
    {
        $url = "http://htmlproject/user/checkEmail?email=$email&hash=$hash";
        // отправка 

        $this->emailService
                ->emailTo($email)
                ->subject("Регистрация пользователя")
                ->body("Подтвердите вашу почту $url")
                ->send();
    }

    /**
     * проверяем логин пароль и возвращаем результат проверки
     */
    public function login($email, $pass) : bool
    { 
        // шифруем пароль пользователя
        $password = static::_hashPassword($pass);
        // 'проверяем логин пароль и возвращаем результат проверки';
        $resultCheck =  $this->storageUser->checkAuth($email ,$password);

        if($resultCheck){ 
            
            // $_SESSION['id'] = $resultCheck['id'];
            // $_SESSION['name'] = $resultCheck['name'];
            $_SESSION = $resultCheck;

            // отправляем письмо
            $this->emailService
                    ->emailTo($email)
                    ->subject("Вы авторизировались в системе")
                    ->body("Добро пожаловать в клуб любителей добалять объявления $email")
                    ->send();
            return true;
         }

        // ошибка проверки
        return false;
         
    }

 

    private static function _hashPassword($text)
    {
        return md5( md5(md5($text). self::SOLT) );
    }


    /**
     * залогинен пользователь? или нет
     */
    public static function isAuth(): bool
    {
        if(isset( $_SESSION['id']))
        {
            return true;
        }
        
        return false;
        
        // можно и так 
     //   return isset( $_SESSION['id']);
    }

    /**
     * logout
     */
    public function  logout(): bool
    {
       unset($_SESSION['id']);
       return true;
    }
}