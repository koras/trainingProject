console.log('12')
    // 2. Создание переменной request

var body = ['\r\n'];
var boundary = String(Math.random()).slice(2);
var boundaryMiddle = '--' + boundary + '\r\n';
var boundaryLast = '--' + boundary + '--\r\n'

for (var key in data) {
    // добавление поля
    body.push('Content-Disposition: form-data; name="' + key + '"\r\n\r\n' + data[key] + '\r\n');
}
body = body.join(boundaryMiddle) + boundaryLast;


var request = new XMLHttpRequest();
// 3. Настройка запроса
request.open('GET', 'https://praktikum.tk/cohort12/cards', true);
// 4. Подписка на событие onreadystatechange и обработка его с помощью анонимной функции
request.addEventListener('readystatechange', function() {
    // если состояния запроса 4 и статус запроса 200 (OK)
    if ((request.readyState == 4) && (request.status == 200)) {
        // например, выведем объект XHR в консоль браузера
        console.log(request);
        // и ответ (текст), пришедший с сервера в окне alert
        console.log(request.responseText);
        // получить элемент c id = welcome
        var welcome = document.getElementById('welcome');
        // заменить содержимое элемента ответом, пришедшим с сервера
        welcome.innerHTML = request.responseText;
    }
});


// 5. Отправка запроса на сервер
// coment test 2

// я бы поправил, но не хочу
request.send(body);