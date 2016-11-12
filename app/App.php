<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 11/11/2016
 * Time: 15:41
 */


namespace App;


use App\Table\Table;

class App
{
    private static $_instance;
    private $db_instance;

    public $title = "Mon super site";

    private function __Construct()
    {

    }

    public static function getInstance()
    {
        if (empty(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getTable($name)
    {
        $class_name = "\\App\\Table\\" . ucfirst(strtolower($name)) . "Table";
        return new $class_name(strtolower($name));
    }

    public function getDB()
    {
        $config = Config::getInstance();
        if (empty($this->db_instance))
        {
            $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_host'),$config->get('db_pass'));
        }
        return $this->db_instance;
    }


}