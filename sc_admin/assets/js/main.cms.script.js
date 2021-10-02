var ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {

    class sc_js {
        constructor() {
        }

        actions(element, action, target) {
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
                    case "open_menu":
                        if (tg != null){
                            if (tg.classList.contains('hr_actv')){
                                tg.classList.remove('hr_actv');
                                el.innerHTML = '<i class="fas fa-bars"></i>Меню';
                            } else {
                                el.innerHTML = '<i class="fas fa-times"></i>Меню';
                                tg.classList.add('hr_actv');
                            }
                        }
                        break;
                    case "open_text":
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
                    case "open_tab":
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

        unfocus_elements() {
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
        };

        init_select2(element) {
            let selects = Array();
            selects.push(element);
            console.log(selects);
            selects.forEach(select => {
                select.select2();
            });
        }

        /*
            [Функция отправки формы]
        */
        aj_form(form, typeform) {
            let _form = new FormData(form);
            let _form_request = new XMLHttpRequest();
            let _form_method = form.getAttribute('method');
            let _form_action = form.getAttribute('action');
            _form_request.open(_form_method, _form_action);
            // _form_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            _form_request.responseType = "JSON";
            if (typeform && typeof typeform !== false) {
                _form.append(typeform, '1');
            }
            _form_request.send(_form);
            _form_request.onload = function () {
                let _response_object = JSON.parse(_form_request.response);
                console.log(_response_object.status);
                if (_response_object){
                    switch (typeform) {
                        /* [Обработка с авторизации в админку] */
                        case "sc_login":
                            if (_response_object.status === true) {
                                console.log(_response_object.text);
                                let container = document.querySelector('.ln_pe_in');
                                if (container && typeof container !== false) {
                                    container.style.maxWidth = "100%";
                                    setTimeout(() => location.reload(), 1500);
                                }
                            } else if(_response_object.status === false) {
                                if (_response_object.text){
                                    let _err = form.querySelector('.frm_err');
                                    _err.classList.add('frm_err_show');
                                    _err.textContent = _response_object.text;
                                    setTimeout(function() {_err.textContent = ""; _err.classList.remove('frm_err_show')}, 5000);
                                }
                                let _inputs = _response_object.inputs;
                                _inputs.forEach(_inp => {
                                   let _selector = form.querySelector('input[name="'+_inp.element+'"]');
                                   _selector.nextElementSibling.textContent = _inp.text;
                                   setTimeout(() => _selector.nextElementSibling.textContent = "", 5000);
                                });
                            }
                        break;
                    }
                }
            }
        }
    }

    var sc_Js = new sc_js();

    const elements = document.querySelectorAll('*[data-action]');

    elements.forEach(el => {
        el.addEventListener('click', event => {
            sc_Js.actions(el, el.getAttribute('data-action'), el.getAttribute('data-target') != null ? el.getAttribute('data-target') : null);
        });
    });

    sc_Js.unfocus_elements();

    sc_Js.init_select2($('#cms-select-parent'));

    let sc_forms = document.querySelectorAll('.sc_form');
    if (sc_forms && typeof sc_forms !== false) {
        sc_forms.forEach(sc_form => {
            sc_form.addEventListener('submit', e => {
                e.preventDefault();
                sc_Js.aj_form(sc_form, sc_form.getAttribute('data-typeform'));
            });
        });
    }
});