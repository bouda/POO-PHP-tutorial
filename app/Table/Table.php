<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 12/11/2016
 * Time: 11:45
 */

namespace App\Table;


class Table
{

    protected $table;

    public function __construct($name)
    {
        if(empty($this->table))
        {
            $this->table = $name;
        }
    }
}