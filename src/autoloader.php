<?php
/**
 * Defined MAINDIR and autoloader function
 */

define('MAINDIR',__DIR__);

spl_autoload_register(function ($classname){
    $fullpath = __DIR__ . '/' . str_replace('\\','/',$classname) . '.php';
    if (file_exists($fullpath)) {
        require_once($fullpath);
    } else {
        throw new Exception("Undefined class ".$classname);
    }
});
