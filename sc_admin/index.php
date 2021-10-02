<?php


session_start();

/*
 [Глобальный путь до файла]
*/
define("DOC_ROOT", dirname(__FILE__));

/*
    [Подключение конфигов]
*/
require_once(DOC_ROOT . '/configs/global_config.php');
require_once(DOC_ROOT . '/configs/db_config.php');
require_once(DOC_ROOT . '/configs/functions_config.php');
require_once(DOC_ROOT . '/configs/router.php');
$_func = new sc_func(Db::get_connection(DB_HOST, DB_NAME, DB_CHARSET, DB_USERNAME, DB_PASSWORD));

$router = new Router(Db::get_connection(DB_HOST, DB_NAME, DB_CHARSET, DB_USERNAME, DB_PASSWORD), $twig);
$router->run('admin');


//    define("DOC_ROOT",dirname(__FILE__));
//
//    /*
//        [Подключение конфигов]
//    */
//    require_once(DOC_ROOT . 'configs/db_config.php');
//    require_once(DOC_ROOT . 'configs/functions_config.php');
//    $_func = new sc_func($_db);
//
//    /*
//        [Подключение шапки админ.панели]
//    */
//    include('header.php');
//
//    /*
//        [Проверка авторизации]
//    */
//    if (isset($_COOKIE['hash'])) {
//        $_cookie_hash = $_COOKIE['hash'];
//        $_hash = $_SESSION['hash'];
//        if (sha1($hash) == $_cookie_hash) {
//            $_auth = true;
//        } else {
//            $_auth = false;
//        }
//    }
//
//     if (isset($_COOKIE['hash']) && $_auth) {
//
//        /*
//            [Управление вывода шаблонов определенных страниц]
//        */
//        switch($_func->check_url($_SERVER['REQUEST_URI'])) {
//            /* [Главная страница администраторской панели] */
//            case '/sc_admin/':
//                echo $twig->render('@admin/index.html', array('name' => 'Алексей'));
//            break;
//        }
//
//     } else {
//         if ($_func->check_url($_SERVER['REQUEST_URI']) == '/sc_admin/recovery'){
//             echo $twig->render('@admin/recovery.html');
//         } else {
//             echo $twig->render('@admin/login.html');
//         }
//     }
//
//
//    /*
//        [Подключение подвала админ.панели]
//    */
//    include('footer.php');