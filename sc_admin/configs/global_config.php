<?php

    /*
        [Вывод ошибок PHP]
    */
    if ($_GET['sc_debug'] == 'on'){
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
    }

    /*
        [Параметры для подключения к базе данных]
    */
    define("DB_HOST", "localhost");
    define("DB_NAME", "db_seococktailcms");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_CHARSET", "utf8");

    /*
        [Глобальный путь до папки с сайтом]
    */
    define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT']);


    /*
        [Подключение Twig шаблонизатора]
    */
    require_once DOC_ROOT . '/vendor/autoload.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem();
    /* Пространство admin - для шаблонов страниц админстраторской панели */
    $loader->addPath(DOC_ROOT . '/sc_admin/layouts', 'admin');
    /* Пространоство site - для шаблонов страниц сайта */
    $loader->addPath(DOC_ROOT . '/layouts', 'site');
    $twig = new Twig_Environment($loader, array('cache' => 'compilation_cache', 'debug' => true));


    // echo DOC_ROOT;
    // echo 'Подключен глобальный конфиг';