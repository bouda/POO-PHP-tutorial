<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 11/11/2016
 * Time: 15:41
 */


namespace App;


class App
{
    const DB_NAME = 'database';
    const DB_USER = 'root';
    const DB_PASS = 'docker';
    const DB_HOST = 'mysqlserver';

    private static $database;

    public static function getDb()
    {
        if (self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_HOST, self::DB_PASS );
        }
        return self::$database;
    }
}