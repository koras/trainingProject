<?php
namespace App\services;

use App\services\AdvertServiceInterface;

use App\repositories\Adverts;

class AdvertService implements AdvertServiceInterface {

    private static $singletone = null;

    private $storageAdvert;

    public function __construct() {
        // это локальная переменная которая принадлежит только конструктору
        $storageAdvert = 0;
        //  это локальная переменная которая принадлежит классу
        $this->storageAdvert =  new Adverts();
     }


     public function getShow($id = 1){

       $row =  $this->storageAdvert -> getOne($id);
        return $row;
     }



    /**
     * Здесь мы записываем новое объявление в базу данных
     * @param array $params - данняе для объявления
     * @return  array - что мы записали
     */
    public function createAdvert(array $params) : array {

        


        //  $params['id'] = rand(10, 9000);
         $dbAdverts =  self::getDb();
        //   if(isset($params['id'])){
        //           $id = $params['id'];
        //           foreach($dbAdverts as $advert){
        //               if($id == $advert['id']){
        //                   return $advert;
        //               }
        //           }
        //   } 
          return [];
      }


      /**
       * Здесь мы записываем новое объявление в базу данных
       * @param array $params - данняе для объявления
       * @return  array - что мы записали
       */
      public function getAdvert(array $params) : array {
        //  $params['id'] = rand(10, 9000);
         $dbAdverts =  self::getDb();
          if(isset($params['id'])){
                  $id = $params['id'];
                  foreach($dbAdverts as $advert){
                      if($id == $advert['id']){
                          return $advert;
                      }
                  }
          } 
          return [];
      }




    public static function getInstance() {
        
        if(!isset(self::$singletone))
        {
           // echo 'get Instance <br>';

            self::$singletone = self::getDb();
        }

        
     //   echo 'get Instance second <br>';
        return self::$singletone;
    }


    private static function getDb() {
      return   [[
                    'cost'=> 1000,
                        'id'=> 3,
                        'title'=> "Roberto Botticelli кроссовки",
                        'address'=> "Москва, ул. 10-летия Октября",
                        "characteristic"=>["condition"=>0],
                        'img'=>'https://36.img.avito.st/image/1/sZg_6LayHXEJQd90Ufbu0sdLHXefSR8',
                        "description" => "Абсолютно новые кроссовки, премиального итальянского бренда, стелька 28 см. Коробка, чехлы. Made in Italy",
                ],[
                        'cost'=> 125000,
                        'id'=> 6,
                        'img'=>'https://78.img.avito.st/image/1/M10aC7ayn7Qsol2xcAt5Lfyon7K6qp0',
                        'title'=> "Мужская сумка 2018959 HJ001 black",
                        'address'=> "Москва, ул Ленина 34",
                        "characteristic"=>['type'=>"Портфель","condition"=>1,'dimensions'=> ["width"=>34, "Length"=> 78, "height"=> 13],],
                        "description" => "Изысканный портфель от итальянского бренда Giorgio-Ferretti выполненная из натуральной, качественной кожи. Приятный черный цвет и красивая фурнитура дополнят Ваш стильный и элегантный образ. В сумке 2 внешних кармана и 7 вместительных карманов внутри. Сумка закрывается на удобную молнию. Внутри Вы сможете с легкостью расположить телефон и все необходимые аксессуары с помощью удобных внутренних карманов.",

                    ],[
                        'cost'=> 73090,
                        'id'=> 9,
                        'img'=> "https://55.img.avito.st/image/1/5oZXG7aySm9hsohqFyyM_LC4Smn3ukg",
                        'title'=> "Косуха куртка кожанная оверсайз",
                        'address'=> "Рязань, ул Октября 1",
                        "characteristic"=>["condition"=>1],
                        "description" => "Косуха куртка кожанная оверсайз РАСПРОДАЖА! СКИДКА 40% - цена 2900р вместо 3900р! 
                                        Успейте купить, осталось всего 5 штук! 
                                        ПРИЕЗЖАЙТЕ В ШОУ-РУМ🤗 м.Академическая (5 мин от метро) . Новая косуха 2021 В жизни смотрится нереально круто 😍😍 
                                        Все размеры в наличии 42-48 Все цвета в наличии . 
                                        НАПИШИТЕ МНЕ - ОТПРАВЛЮ ВАМ ФОТКИ ИЗ ШОУ-РУМА НА ВАТСАП😘",
                    ],[
                        'cost'=> 10800,
                        'id'=> 12,
                        'img'=> 'https://50.img.avito.st/640x480/10892156850.jpg',
                        'title'=> "Jaguar F-type, 2017",
                        'address'=> "Москва, Большая Татарская ул., 36",
                        "characteristic"=>["condition"=>1],
                        "description" => "Автомобиль сертифицирован по программе “Jaguar Approved”. ПТС оригинал. Место осмотра Осмотреть автомобиль можно по адресу: Москва, 2я Магистральная улица, д. 18, стр. 22",
                    ],[
                        'cost'=> 1000,
                        'id'=> 14,
                        'img'=>"https://08.img.avito.st/640x480/10752355908.jpg",
                        'title'=> "Genesis GV80, 2020",
                        'address'=> "Москва, Ленинградское ш., 39с7",
                        "characteristic"=>["condition"=>1],
                        "description" => "Эксклюзивные особенности данного авто: -Полный комплект ключей и документов -Кузов без вторичных окрасов -Единственный владелец -Электронный ПТС Комплектация Premium: -Цвет Brunswick Green Matt (темно-зеленый) -3-зонный климат-контроль с системой очистки воздуха -Приборная панель SUPERVISION -Система кругового обзора -Система контроля слепых зон -Ассистент перестроения -Активный круиз -Вентиляций передних сидений -Подогревы всех сидений -Отделка салона Алюминием с текстурой G-Matrix -Натуральная кожа Signature c контрастным кантом -Комфортное сиденье водителя ERGO MOTION Seat -Шторки на стеклах задних дверей -Беспроводная зарядка -Дифференциал повышенного трения с электронным управлением на задней оси -Бортовый видеорегистратор с камерами спереди и сзади",
                    ],[
                        'cost'=> 1000,
                        'id'=> 16,
                        "img"=>"https://03.img.avito.st/image/1/zo1trrayYmRbB6Bhfc3xxIsNYmLND2A",
                        'title'=> "iPhone 6 / 6s / 7 plus / 8 plus / X / XS",
                        'address'=> "Москва, Дорожная ул., 3к6",
                        "characteristic"=>["condition"=>0],
                        "description" => "Продаeтся,тeлефoн восстановленные оригинальный запeчаттaный iрhonе и дpугие мoдeли.
                        смотpитe в пpoфилe в наличии все модели - 
                        AMEРИKAHCKИЕ MОДEЛИ LL/А. 
                        Пpивозим нa пpямoю c амepике. -всe модeли рабoтают с любыми сим-каpтами Еврoпы амepике - 
                        пoддeрживают вcе языкe.тeлефoны oригинaльный 100%(не копии)",
                    ],[
                        'cost'=> 155000,
                        'id'=> 23,
                        'img'=>"https://39.img.avito.st/image/1/HkS9Craysq2Lo3CojXIBekKpsqsdq7A",
                        'title'=> "Пустая бутылка из под вина Romanee-Conti Crand CRU",
                        'address'=> "Москва, пр-т Маршала Жукова",
                        "characteristic"=>["condition"=>0],
                        "description" => "Пустая бутылка из под вина Romanee Conti Crand CRU 
                        год 2006
                        бутылка в целости и хорошем состоянии 
                        Для коллекционеров",
                    ],[
                        'cost'=> 510600,
                        'id'=> 45,
                        'title'=> "Моторная яхта,9.00м.сталь, голландия",
                        'img'=>'https://36.img.avito.st/image/1/sZg_6LayHXEJQd90Ufbu0sdLHXefSR8',
                        'address'=> "Москва, ул. Поликарпова, 27",
                        "characteristic"=>["condition"=>1],
                        "description" => "",
                    ],[
                        'cost'=> 810700,
                        'id'=> 54,
                        'img'=> "https://65.img.avito.st/640x480/10855356165.jpg",
                        'title'=> "Продается торговое помещениея",
                        'address'=> "Москва, поселение Сосенское, Скандинавский б-р, 23к2",
                        "characteristic"=>["condition"=>1],
                        "description" => "1975 год, верфь,,тен бруук ,,модель 9.0 ак , кабриолет(мягкий тент рубки) , голландия
                        ( 8.60х2.75 метра)+кринолин купальная площадка, корпус и надстройки -сталь, ремонт корпуса лодки верфь,,пеликан,,калиниград,,
                        дизель пежо 65 л/с,капитальный ремонт,200 мото/час,
                        новый ,питон драйв,",
                    ],
                ];
    }

    protected function __clone(){}

    public function __wakeup(){}
}

 