<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 11/11/2016
 * Time: 17:22
 */

namespace App\Table;
use App\App;

class Categorie extends Table
{
   protected static $table = 'categories';


    public function getUrl()
    {
        return "index.php?p=categorie&id=".$this->id;
    }

}