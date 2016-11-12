<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 12/11/2016
 * Time: 10:05
 */

namespace App;


class Config
{
    private $settings = array();

    private static $_instance;


    private function __construct()
    {
        $this->id = uniqid();
        $this->settings = require dirname(__DIR__)."/config/config.php";

    }

    public static function getInstance()
    {
        if (empty(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    public function get($key)
    {
        if (!isset($this->settings[$key]))
        {
            return null;
        }
        return $this->settings[$key];
    }

}