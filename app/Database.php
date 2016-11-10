<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 10/11/2016
 * Time: 12:30
 */

namespace App;

use \PDO;


class Database
{

    private $db_name;
    private $db_user;
    private $db_host;
    private $db_pass;

    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct($db_name, $db_user='root', $db_host = 'mysqlserver', $db_pass = 'docker')
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
    }

    private function getPDO()
    {
        if($this->pdo === null){
            $pdo = new PDO("mysql:dbname=". $this->db_name .";host=". $this->db_host , $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $className)
    {
        $pdo = $this->getPDO();
        $res = $pdo->query($statement);
        $data = $res->fetchAll(PDO::FETCH_CLASS, $className);
        return $data;

    }

    public function prepare($statement, $param, $class_name, $one = false)
    {
        $pdo = $this->getPDO();
        $req = $pdo->prepare($statement);
        $req->execute($param);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $data = $req->fetch();
        }
        else{
            $data = $req->fetchAll();
        }


        return $data;
    }
}