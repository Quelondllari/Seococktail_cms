<?php
    
    session_start();

    /*
        [Подключение конфигов]
    */
    require_once('sc_admin/configs/db_config.php');
    require_once('sc_admin/configs/functions_config.php');
    $_func = new sc_func($_db);

    echo $_func->check_url($_SERVER['REQUEST_URI']);

    // echo $twig->render('Hello {{name}}!', array('name' => 'Alexey'));