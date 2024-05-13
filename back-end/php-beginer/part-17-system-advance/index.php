
<?php
    require 'lib/template.php';
    
    $mod = empty($_GET['mod']) ? 'home' : $_GET['mod'];
    $act = empty($_GET['act']) ? 'main' : $_GET['act'];
    $path = "modules/{$mod}/{$act}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        get_404();
    }
?>