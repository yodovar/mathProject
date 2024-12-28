<?php
Class Router{

    public $routes;

    public function __construct()
    {
       $routesPath = ROOT."/components/routes.php";
       return $this->routes = include_once($routesPath);
    }
    
    private function getUri(){
        if(!empty($_SERVER['REQUEST_URI']))
            // Получаем полный URI и удаляем '/project/router/index.php' если он присутствует
            $s_uri = str_replace('/project/router/', '', $_SERVER['REQUEST_URI']);
        
        // Выводим оставшуюся часть URI без начальных и конечных слешей
        return trim($s_uri);
    }

    public function run(){
        $uri = $this->getUri();

        foreach($this->routes as $uriPattern => $path){
            if (preg_match("~$uriPattern~","$uri")){
                $segments = explode('/', $path);
                $controllerName = array_shift($segments)."Controller";
                $actionName = "action".ucfirst(array_shift($segments));
                $fileName  = ROOT."/controller/".$controllerName.'.php';
                if(file_exists($fileName)){
                    include_once($fileName);
                }
                $objectController = new $controllerName;
                // Исправление: проверяем, существует ли метод перед его вызовом
                $result = method_exists($objectController, $actionName) ? $objectController->$actionName() : null;
                exit;
                if ($result != NULL){
                    break;
                }
            }
        }
    }

}
