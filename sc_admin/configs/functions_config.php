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

        public function sanitize_data()
        {
            array_walk_recursive($_POST, function ($value){
                $value = trim($value);
                $value = stripcslashes($value);
                $value = htmlspecialchars($value);
            });
            array_walk_recursive($_GET, function ($value){
                $value = trim($value);
                $value = stripcslashes($value);
                $value = htmlspecialchars($value);
            });
        }

        public function generate_password($length = 8) {
            $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $_pass = "";
            $_max = mb_strlen($alphabet, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $_pass .= $alphabet[random_int(0, $_max)];
            }

            return $_pass;
        }
    }