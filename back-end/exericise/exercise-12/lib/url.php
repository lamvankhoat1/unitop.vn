<?php
    ob_start();
    function redirect_to($url) {
      if (!empty($url)) {
        header("Location: {$url}");
      }
    }
?>