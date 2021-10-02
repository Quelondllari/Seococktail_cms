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
        [Глобальный путь до сайта]
     */
    define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    /*
        [Параметры для подключения к базе данных]
    */
    define("DB_HOST", "localhost");
    define("DB_NAME", "i-dez_print");
    define("DB_USERNAME", "046429951_print");
    define("DB_PASSWORD", "bRC2H5!eu6CP");
    define("DB_CHARSET", "utf8");

    /*
        [Подключение Twig шаблонизатора]
    */
    require_once ROOT . '/vendor/autoload.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem();
    /* Пространство admin - для шаблонов страниц админстраторской панели */
    $loader->addPath(ROOT . '/sc_admin/views', 'admin');
    /* Пространоство site - для шаблонов страниц сайта */
    $loader->addPath(ROOT . '/views', 'site');
    $twig = new Twig_Environment($loader, array('cache' => 'compilation_cache', 'debug' => true));


    // echo DOC_ROOT;
    // echo 'Подключен глобальный конфиг';