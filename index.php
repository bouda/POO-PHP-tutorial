<?php
require "vendor/autoload.php";

//settings for xdebug reporting error
//ini_set('xdebug.collect_vars', 'on');
//ini_set('xdebug.collect_params', '4');
//ini_set('xdebug.dump_globals', 'on');
//ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
ini_set('xdebug.show_local_vars', 'on');

//Error reporting
error_reporting(E_ALL);


if (isset($_GET['p'])){
    $p = $_GET['p'];
}
else {
    $p = 'home';
}

// Initialisation des objets

ob_start();
if ($p === 'home') {
    require "pages/home.php";
} elseif ($p === 'article'){
    require "pages/single.php";
}
$content = ob_get_clean();
require "pages/templates/default.php";

