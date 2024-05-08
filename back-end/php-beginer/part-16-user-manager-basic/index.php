
<?php
    require 'data/users.php';
    $page = empty($_GET['page']) ? 'home' : $_GET['page'];
    $path = "pages/{$page}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        get_404();
    }
?>