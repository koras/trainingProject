let template = `
<div class="card-mini" id="${id}">
    <div class="card-mini-preview">
        <img src="./images/${img}.jpg" />
    </div>
    <div class="card-info">
        <div class="card-mini-title">
            ${title}
        </div>
        <div class="card-mini-cost">
        ${cost} ₽
        </div>
    </div>
</div>`;

document.getElementById('myButton').addEventListener('click', function() {
    alert(123123);
});