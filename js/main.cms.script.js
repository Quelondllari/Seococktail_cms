var ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {

    const elements = document.querySelectorAll('*[data-action]');

    /*
     * Action event
     ***
     * element => document element
     * action => data-action = ""
     * target => data-target = ""
    */
    function action(element, action, target) {
        let el= element != null ? element : null;
        let an = action != null ? action : null;
        let tg = target != null ? document.querySelector(target) : null;
        if (el != null && an != null)
        switch (an) {
            case "open-text":
                if (tg != null){
                    if (tg.style.maxHeight) {
                        tg.style.maxHeight = null;
                        el.textContent = "Раскрыть";
                    } else {
                        tg.style.maxHeight = tg.scrollHeight + "px";
                        el.textContent = "Скрыть";
                    }
                }
            break;
        
            default:
                break;
        }
    };


    elements.forEach(el => {
        el.addEventListener('click', event => {
            action(el, el.getAttribute('data-action'), el.getAttribute('data-target'));
        });
    });
});