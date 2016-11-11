<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 10/11/2016
 * Time: 15:16
 */

namespace App\Table;


use App\App;

class Article extends Table
{

    public static function getLast(){
        return App::getDb()->query("SELECT 
                                      articles.id,
                                      articles.titre,
                                      articles.contenu,
                                      categories.titre as categorie
                                      FROM articles 
                                      LEFT JOIN categories 
                                        ON articles.category_id = categories.id",
            __CLASS__);
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