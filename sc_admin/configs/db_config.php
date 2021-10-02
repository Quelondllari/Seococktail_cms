<?php

class Db{
    public static function get_connection($db_host, $db_name, $db_charset, $db_username, $db_password){
        $_options = [
           PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
           PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $_connection_string = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
        return new PDO ($_connection_string, $db_username, $db_password, $_options);
    }
}
//    require_once('global_config.php');
//
//    $_con = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
//    $_opt = [
//        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_EMULATE_PREPARES   => false,
//    ];
//    $_db = new PDO($_con, DB_USERNAME, DB_PASSWORD, $_opt);
