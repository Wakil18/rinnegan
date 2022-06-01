<?php
    /*
    *App Core Class
    *Creates URL & loads core controller
    *URL format will be - /controller/method/params
    */
    class Core{
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->getUrl();

            // Look in the controller for the 1st value
            if(isset($url[0])){
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){

                    // If exixts, set as controller
                    $this->currentController = ucwords($url[0]);
    
                    // Unset 0 index
                    unset($url[0]);
    
                }
            }

            // if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //     // If exixts, set as controller
            //     $this->currentController = ucwords($url[0]);
            //     // Unset 0 index
            //     unset($url[0]);
            // }

            // Requiring the Controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instentiating the Controller class
            $this->currentController = new $this->currentController;

            // Check for the method which is the 2nd part or the url
            if(isset($url[1])){
                // Check to see if the method exists
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];

                    // Unset 1 index
                    unset($url[1]);
                }
            }


            // Getting the Params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with the array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
