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
            case "open-tab":
                if (tg != null){
                    if (tg.style.maxHeight) {
                        tg.style.maxHeight = null;
                        el.innerHTML = '<i class="fal fa-plus"></i>';
                    } else {
                        tg.style.maxHeight = tg.scrollHeight + "px";
                        el.innerHTML = '<i class="fal fa-minus"></i>';
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

    /*
     * init Select2
     ***
    */
    function init_select2() {
        let selects = Array();
        selects.push($('#cms-select-parent'));
        console.log(selects);
        selects.forEach(select => {
            select.select2();
        });
    }
    init_select2();
});