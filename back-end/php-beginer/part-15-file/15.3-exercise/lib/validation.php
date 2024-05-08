<?php
  function set_value($label) {
    if (isset($_POST[$label])) {
        // return $_POST[$label];
        return str_replace('"', '\'', $_POST[$label]);
      } else {
        return "";
      }
  }

  function show_error($label) {
    global $error;
    if (isset($error[$label])) {
      return $error[$label];
    } else {
        return "";
    }
  }
?>