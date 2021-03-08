function getTamplate() {
    let template = `
    <div class="card" id="1">
    <div class="card-preview">
        <img src="./images/default.jpg">
    </div>
    <div class="card-title">
        Заголовок объявления
    </div>
    <div class="card-cost">
        200 000 ₽
    </div>
    <div class="card-address">
        Москва, проспект Ленина, 21
    </div>
</div>`;
    return template;
}


if (document.getElementById('myButton')) {
    document.getElementById('myButton').addEventListener('click', function() {


        let tamp = getTamplate();
        console.log(tamp);
        let liLast = document.getElementById('adverts')
        liLast.insertAdjacentHTML('afterend', tamp);
        //  liLast.append(liLast); // вставить liLast в конец <ol>
    });
}