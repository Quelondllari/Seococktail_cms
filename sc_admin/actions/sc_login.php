<?php

    /*
        [Подключение конфигов]
    */
    require_once('../configs/db_config.php');
    require_once('../configs/functions_config.php');
    $_func = new sc_func($_db);
    /*
        [Массив ответа JSON]
     */
    $_response = array(
        'status' => false,
        'text' => "",
        'inputs' => array(),
    );

    /*
        [Обработка POST и GET полей]
     */
    $_func->sanitize_data();

    if (isset($_POST['sc_login']) && $_POST['sc_login'] == '1') {

        // [Проверка существования логина]
            $_login = "";
        if (isset($_POST['sc_form']['login']) && !empty($_POST['sc_form']['login'])){
            $_login = $_POST['sc_form']['login'];
        } else {
            $_response_input = array(
                'element' => "sc_form[login]",
                'text' => "Не заполнен логин."
            );
            $_response['inputs'][] = $_response_input;
        }
        // [Проверка пароля]
            $_password_hash = "";
            $_password = "";
        if (isset($_POST['sc_form']['password']) && !empty($_POST['sc_form']['password'])){
            $_password = $_POST['sc_form']['password'];
            $_admin = $_db->prepare("SELECT password FROM `sc_admins` WHERE login = ?");
            $_admin->execute(array($_login));
            if ($_admin->rowCount() > 0) {
                if (password_verify($_password, $_password_hash)){
                    $_site_hash = $_func->generate_password(64);
                    $_SESSION['hash'] = $_site_hash;
                    $_expire_cookie = time() + 60 * 60 * 24 * 30;
                    $_options_crypt = array(
                        'cost' => 8,
                    );
                    $_cookie_hash = password_hash($_site_hash, PASSWORD_BCRYPT, $_options_crypt);
                    setcookie('hash', $_cookie_hash, $_expire_cookie, '/');

                    $_response['status'] = true;
                    $_response['text'] = "Успешная авторизация. Добро пожаловать.";
                } else {
                    $_response_input = array(
                        'element' => "sc_form[password]",
                        'text' => "Неправильный пароль."
                    );
                    $_response['inputs'][] = $_response_input;
                }
            } else {
                $_response['text'] = "Администратор с таким логином не найден.";
            }
        } else {
            $_response_input = array(
                'element' => "sc_form[password]",
                'text' => "Не заполнен пароль."
            );
            $_response['inputs'][] = $_response_input;
        }

    }

    echo json_encode($_response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
