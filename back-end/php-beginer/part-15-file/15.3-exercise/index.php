
<?php
    require 'lib/template.php';
    get_header();
    $page = empty($_GET['page']) ? 'home' : $_GET['page'];
    $path = "pages/{$page}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        get_404();
    }
    get_footer();
?>