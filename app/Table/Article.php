<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 10/11/2016
 * Time: 15:16
 */

namespace App\Table;


class Article
{

    public function __get($name)
    {
        $method = "get" . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

    public function getUrl()
    {
        return "index.php?p=article&id=".$this->id;
    }

    public function getExtrait()
    {
        $html = "<P>" . substr($this->contenu,0 ,250) . "</P>";
        $html .= "<P><a href=" . $this->getUrl() . ">Voir la suite ...</a></P>";
        return $html;
    }
}