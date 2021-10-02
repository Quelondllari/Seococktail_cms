<?php
    
    session_start();

    /*
     [Глобальный путь до файла]
    */
    define("DOC_ROOT",dirname(__FILE__));

    /*
        [Подключение конфигов]
    */
    require_once(DOC_ROOT . '/sc_admin/configs/global_config.php');
    require_once(DOC_ROOT . '/sc_admin/configs/db_config.php');
    require_once(DOC_ROOT . '/sc_admin/configs/functions_config.php');
    require_once(DOC_ROOT . '/sc_admin/configs/router.php');
    $_func = new sc_func(Db::get_connection(DB_HOST, DB_NAME, DB_CHARSET, DB_USERNAME, DB_PASSWORD));

    $router = new Router(Db::get_connection(DB_HOST, DB_NAME, DB_CHARSET, DB_USERNAME, DB_PASSWORD), $twig);
    $router->run('site');

