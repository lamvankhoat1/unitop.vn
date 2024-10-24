<?php
    function get_header() {
        if(file_exists("/inc/header.php")) {
            require '/inc/header.php';
        }
    }
    function get_footer() {
        if(file_exists("/inc/footer.php")) {
            require '/inc/footer.php';
        }
    }
?>