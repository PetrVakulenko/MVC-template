<?php
/**
 * Route class for running controller and action, or error
 */

namespace Core;

class Route {

    static function start() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/',$url['path']);

        $controllerName = isset($routes[1]) && $routes[1] != '' ? $routes[1] : 'Main';
        $actionName = isset($routes[2]) && $routes[2] != '' ? $routes[2] : 'index';

        $modelName = '\\Models\\Model'.ucfirst($controllerName);
        $controllerName = '\\Controllers\\Controller'.ucfirst($controllerName);
        $actionName = 'action'.ucfirst($actionName);

        try {
            $controller = new $controllerName(
                file_exists(MAINDIR.'/Model'.ucfirst($controllerName))
                ? new $modelName()
                : null
            );
            $controller->$actionName();
        } catch (\Exception $exception){
            self::NotFound($exception->getMessage());
        }
    }

    private static function NotFound(string $message = ''){
        (new \Controllers\ControllerError())->actionError($message);
    }
}