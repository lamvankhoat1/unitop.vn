<?php
  function get_post_by_id($id) {
    global $tbl_list_posts;
    $query_string = "SELECT * FROM {$tbl_list_posts} WHERE id = {$id}";
    return db_fetch_row($query_string);
  }
?>