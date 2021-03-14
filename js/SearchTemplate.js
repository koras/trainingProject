/**
 * шаблоны поиска
 */
class SearchTemplate {
    /**
     * 
     * @param {string} type - тип нашего устроиства 
     */
    constructor(types) {
            /**
             * тип устроиства
             */
            this.type = types;
        }
        /**
         * 
         * @param {object} obj 
         * @returns 
         */
    getTamplate(obj) {
            let template = '';
            switch (this.type) {
                case "firefox":
                case "opera":
                case "chrome":
                    {
                        template = this._browser(obj);
                    }
                    break;
                case "iphone":
                case "android":
                    {
                        template = this._mobile(obj);
                    }
                    break;
                default:
                    {
                        template = " not found browser";
                    }
            }
            return template;
        }
        /**
         * Брайзер пользователя на компьютере
         * @param {object} obj  
         * @returns 
         */
    _browser(obj) {
        return `<div class="data-browser">
        <div class="browser-data">
            <div  class="browser-id">${obj.id}</div>
            <div  class="browser-name">${obj.name} </div> 
        </div> 
        <div class="browser-url">
            <a href="${obj.url}">${obj.name}</a>
         </div>
        </div>`;
    }

    /**
     * Мобильное устроиство
     * @param {object} obj  
     * @returns 
     */
    _mobile(obj) {
        return `<div class="data-mobile">mobile<div class="mobile-name">${obj.name} </div><div class="mobile-id">${obj.id}</div></div>`;
    }
}