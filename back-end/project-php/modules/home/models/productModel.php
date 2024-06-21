<?php
  function get_list_products($cat_parent_id) {
    $list_ids = render_list_cats_id($cat_parent_id);
    global $tbl_list_products;
    $query_string = "SELECT id, cat_id, name, price, new_price, REPLACE(thumb_main, \"..\/\", \"\") as thumb_main FROM {$tbl_list_products} WHERE cat_id in (${list_ids}) LIMIT 8 OFFSET 0";
    return db_fetch_array($query_string);
  }
?>