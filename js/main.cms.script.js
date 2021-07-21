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
        let debug_mode = true;
        if (debug_mode == true){
            console.log("Element: ");
            console.log(el);
            console.log("Action: " + an);
            console.log('Target: ');
            console.log(tg);
            console.log("_______________________");
        }
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
            case "dropdown":
                let dropdown_parent = el.parentElement;
                let dropdown = dropdown_parent.querySelector('.drpn');
                if (dropdown != null) {
                    let all_dropdown = document.querySelectorAll('[data-action="dropdown"]');
                    if (el.parentElement.classList.contains('actv_drpn')){
                        el.parentElement.classList.remove('actv_drpn');
                    } else {
                        all_dropdown.forEach(drps => {
                            if (drps.parentElement.classList.contains('actv_drpn')){
                                drps.parentElement.classList.remove('actv_drpn');
                            }
                        });
                        el.parentElement.classList.add('actv_drpn');
                    }
                }
            break;
            default:
                break;
        }
    };


    elements.forEach(el => {
        el.addEventListener('click', event => {
            action(el, el.getAttribute('data-action'), el.getAttribute('data-target') != null ? el.getAttribute('data-target') : null);
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

    /*
     * Unfocus dropdown
     ***
    */
    function unfocus_dropdown() {
        document.body.addEventListener('click', event => {
            var el = event ? event.target : window.event.srcElement;
            let drps = document.querySelectorAll('.drpn *');
            drps.forEach(drp => {
                if (el != drp && !el.parentElement.classList.contains('actv_drpn')) {
                    let parent_drps = document.querySelectorAll('.actv_drpn');
                    parent_drps.forEach(pdrp => {
                        pdrp.classList.remove('actv_drpn');
                    });
                }
            });
        });
    }
    unfocus_dropdown();
});