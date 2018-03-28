<?php
/*
 * @ Main controller class.
 */

namespace Controllers;

abstract class AbstractController implements IController  {
    public $model;
    public $view;

    public function __construct(\Models\IModel $model = null) {
        $this->view = new \Core\View();
        $this->model = $model;
    }

    public function __call($name, $arguments){
        if (strpos($name,'action') !== false){
            $controller = str_replace(
                'Controller',
                '',
                substr(strrchr(get_class($this), "\\"), 1)
            );
            throw new \Exception("Undefined action " .
                str_replace('action','',$name) .
                " (Controller: " . $controller . ")");
        } else {
            throw new \Exception("Undefined method " . $name .
                (count($arguments) > 0 ? " with arguments " . implode(',', $arguments) : ''));
        }
    }

    public static function __callStatic($name,$arguments){
        throw new \Exception("Undefined static method ".$name.
            (count($arguments)>0 ? " with arguments ".implode(',',$arguments) : ''));
    }
}
