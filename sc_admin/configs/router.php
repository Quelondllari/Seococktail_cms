<?php
    class Router{
        private $routes;
        public static $temp_plug;
        private static $db;
        private static $mode = array(
            'admin' => '/sc_admin',
            'site' => '',
        );

        public function __construct($_conn, $template_plug)
        {
            $routes_path = ROOT . '/sc_admin/configs/routes.php';
            $this->routes = include ($routes_path);
            $this->db = $_conn;
            Router::$temp_plug = $template_plug;
        }

        /*
            [Возвращение текущего урла]
            @returns string
         */
        private function get_URI(){
            if (!empty($_SERVER['REQUEST_URI'])) {
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }

        public function run($_mode)
        {
            $req_uri = $this->get_URI();

            foreach($this->routes as $uri_pattern => $path) {
                if (preg_match("~$uri_pattern~", $req_uri)) {
                    $internal_route = preg_replace("~$uri_pattern~", $path, $req_uri);
                    $segments = explode('/', $internal_route);


                    $controller_name = array_shift($segments).'Controller';
                    $controller_name = ucfirst($controller_name);

                    $action_name = 'action' . ucfirst(array_shift($segments));

                    $parameters = $segments;

                    $controller_file = ROOT . Router::$mode[$_mode] . '/controllers/' . $controller_name . '.php';

                    echo $controller_file;

                    if (file_exists($controller_file)) {
                        include_once($controller_file);
                    }

                    $controller_object = new $controller_name();
                    $controller_object->temp_plug = Router::$temp_plug;
                    $result = call_user_func_array(array($controller_object, $action_name), $parameters);
                    if ($result != null){
                        break;
                    }
                }
            }
        }
    }