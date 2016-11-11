<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 11/11/2016
 * Time: 17:58
 */

namespace App\Table;


use App\App;

class Table
{

    protected static $table;

    private static function getTable(){
        if(static::$table === null){
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)) . 's';
        }
        return static::$table;
    }

    public static function all(){
        return App::getDb()->query("SELECT * FROM ". static::getTable() , get_called_class());
    }

    public function __get($name)
    {
        $method = "get" . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

    public static function find($id){
        return App::getDb()->prepare("SELECT * FROM ". static::getTable() . " WHERE id=?" ,array($id), get_called_class(), true);
    }


}