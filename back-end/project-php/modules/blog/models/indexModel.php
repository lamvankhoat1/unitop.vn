<?php
  function get_list_posts($page_position = 1, $num_posts = 4) {
    global $tbl_list_posts;
    $query_string = "SELECT * FROM {$tbl_list_posts} WHERE status = 'publish'";

    $post_start = ($page_position-1)*$num_posts;
    $query_string .= "LIMIT {$num_posts} OFFSET {$post_start}";
    return db_fetch_array($query_string);
  }

  function get_num_posts() {
    global $tbl_list_posts;
    $query_string = "SELECT * FROM {$tbl_list_posts} WHERE status = 'publish'";
    return db_num_rows($query_string);
  }
?>