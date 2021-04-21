<?php
interface StorageIntarface {
    public function save($text);
}
 
interface StorageDataIntarface {
    public function saveData($text);
}

interface footIntarface {
    public function setFoot($foot);
    public function getFoot();
}

class Twitter  implements StorageIntarface {

    private $send;

    public function save($text)
    {
        $this->send->send($text);
    }
}

class FaceBook implements StorageIntarface , footIntarface {
    private $foot;

    public function save($text)
    {
   
      $this->setLog();
      $this->setLogText();
     return  $this->sendMail();
    }

    private function setLog(){
        $send = new Send();
        $send->mail('mail@yandex.ru','name', $text);
    }

    private function setLogText(){

    }
    private function sendMail(){

    }
    /**
     * запись данных
     */
    public function setFoot($foot){
        $this->foot = $foot;
    }
    /**
     * получение
     */
    public function getFoot(){
        return $this->foot;
    }
}

trait Foot {
    private $leg;

    public function myFoot($leg)
    {
        $this->leg = $leg;
    }
}

trait Foot2 {
    private $leg;

    public function myFoot($leg)
    {
        $this->leg = $leg;
    }
}


class Agree extends FaceBook {

    use Foot;

    public function saveData($text)
    {
        $this->myFoot(2);

 //     DB($text);
    }
}







class Jira implements StorageDataIntarface {

    public function saveData($text)
    {
      DB($text);
    }
}


class Rest {
    public function sendMessage($text,$network){
        switch($network){
            case "Twitter" : 
                $net = new Twitter();
            break;
            case "FaceBook" : 
                $net = new FaceBook()
            break;
            case "Jira" : 
                // ошибка будет здесь
                $net = new Jira();
            break;
        }
            $this->pushSite($net,$text);
    }

    private function pushSite(StorageIntarface $classStorage, $text )
    {
        $classStorage->save($text);
    }
}
 