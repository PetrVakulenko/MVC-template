<?php
/**
 * Abstract model class
 */

namespace Models;

abstract class AbstractModel implements IModel {
    public function __call($name, $arguments){
        throw new \Exception("Undefined method " . $name .
            (count($arguments) > 0 ? " with arguments " . implode(',', $arguments) : ''));
    }

    public static function __callStatic($name,$arguments){
        throw new \Exception("Undefined static method ".$name.
            (count($arguments)>0 ? " with arguments ".implode(',',$arguments) : ''));
    }
}