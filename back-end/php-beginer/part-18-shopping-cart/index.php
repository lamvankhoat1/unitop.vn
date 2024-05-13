
<?php
    // lib
    require 'lib/template.php';
    require 'lib/url.php';
    require 'lib/page.php';
    require 'lib/data.php';
    require 'lib/product.php';
    require 'lib/number.php';
    require 'lib/cart.php';
    // data
    require 'data/page.php';
    require 'data/product.php';
    // SESSION
    session_start();
    ob_start();
    
    $mod = empty($_GET['mod']) ? 'home' : $_GET['mod'];
    $act = empty($_GET['act']) ? 'main' : $_GET['act'];
    $path = "modules/{$mod}/{$act}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        get_404();
    }
?>