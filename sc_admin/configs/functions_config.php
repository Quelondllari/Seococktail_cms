<?php
    class sc_func {
        private static $db;
        
        public function __construct($_conn) {
            $this->db = $_conn;
        }

        /*
            [Проверка url'а для вывода шаблона страницы]
        */
        public function check_url($url) {
            return preg_replace('/^([^?]+)(\?.*?)?(#.*)?$/', '$1$3', $url);
        }

        /*
            [Получение значения определенного параметра конфига с БД]
        */
        public function get_param_config($param) {
            $_param_sql = $this->db->prepare("SELECT value FROM `sc_config` WHERE name = ? LIMIT 1");
            $_param_sql->execute(array($param));
            return $_param_sql->fetchColumn();
        }

    }