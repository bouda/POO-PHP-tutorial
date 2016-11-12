<?php
use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
$articles = Article::findByCategory($_GET['id']);
$categories = Categorie::all();
