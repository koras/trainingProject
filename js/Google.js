class Google {
    constructor(el) {
            this.el = el;
            // объявляем класс шаблона. Устанавливаем браузер пользователя
            //   this.template = new SearchTemplate('chrome');
            this.template = new SearchTemplate('iphone');

            // объявляем класс поиска
            this.search = new Search();
        }
        /**
         * форма из поиска
         * @param {string} word 
         */
    form(word) {
            //  debugger;
            // устанавливаем параметры поиска из формы
            this.search.param(word);
            // получаем результаты поиска

            this.resultSearch = this.search.engine();
            // обрабатываем реультаты поиска
            this.eachResult(this.resultSearch, this.el);
        }
        /**
         * 
         * @returns 
         */
    getLength() {
            return this.resultSearch.length;
        }
        /**
         * 
         * @param {array} data 
         * 
         */
    eachResult(data, el) {
        el.innerHTML = '';
        for (let i = 0; i < data.length; i++) {
            // получаем готовый шаблон
            let temp = this.template.getTamplate(data[i]);
            //  el.insertAdjacentHTML('afterend', temp);
            // @url https://developer.mozilla.org/ru/docs/Web/API/Element/insertAdjacentHTML
            el.insertAdjacentHTML('beforeend', temp);
        }
    }

}