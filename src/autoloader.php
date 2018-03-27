<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 27.03.18
 * Time: 9:40
 */

spl_autoload_register(function ($classname){
    $fullpath = __DIR__ . '/' . str_replace('\\','/',$classname) . '.php';
    if (file_exists($fullpath)) {
        require_once($fullpath);
    } else {
        throw new Exception("Undefined class ".$classname);
    }
});
