<?php
  function get_page_by_id($id) {
    global $tbl_list_pages;
    $query_string = "SELECT * FROM {$tbl_list_pages} WHERE id = {$id}";
    return db_fetch_row($query_string);
  }
?>