<?php
  function get_list_sliders() {
    global $tbl_list_sliders;
    $query_string = "SELECT name, REPLACE(slider, \"..\/\", \"\") as slider, url FROM  {$tbl_list_sliders}";
    return db_fetch_array($query_string);
  }
?>