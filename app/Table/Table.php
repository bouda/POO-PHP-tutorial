<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 12/11/2016
 * Time: 11:45
 */

namespace App\Table;



use App\Database\MysqlDatabase;

class Table
{

    protected $table;
    protected $db;

    public function __construct($name, MysqlDatabase  $db)
    {
        $this->db = $db;
        if(empty($this->table))
        {
            $this->table = $name;
        }
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM articles');
    }
}