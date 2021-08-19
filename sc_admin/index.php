<?php

    /*
        [Подключение конфигов]
    */
    require_once('configs/db_config.php');
    require_once('configs/functions_config.php');
    $_func = new sc_func($_db);

    /*
        [Подключение шапки админ.панели]
    */
    include('header.php');

    /*
        [Проверка авторизации]
    */
    if (isset($_COOKIE['hash'])) {
        $_cookie_hash = $_COOKIE['hash'];
        $_hash = $_SESSION['hash'];
        if (sha1($hash) == $_cookie_hash) {
            $_auth = true;
        } else {
            $_auth = false;
        }
    }

     if (isset($_COOKIE['hash']) && $_auth) {
        
        /*
            [Управление вывода шаблонов определенных страниц]
        */
        switch($_func->check_url($_SERVER['REQUEST_URI'])) {
            /* [Главная страница администраторской панели] */
            case '/sc_admin/':
                echo $twig->render('@admin/index.html', array('name' => 'Алексей'));
            break;
        }

     } else {
         echo $twig->render('@admin/login.html');
     }


    /*
        [Подключение подвала админ.панели]
    */
    include('footer.php');